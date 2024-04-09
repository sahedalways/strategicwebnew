@extends('backend.layouts.master')

@section('title', 'Game List')

@section('style')

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/custom_dt_custom.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endsection

<style>
    td {
        white-space: normal !important;
    }
</style>

@section('content')

    <div class="row layout-spacing mt-3 mx-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

            {{-- display error message --}}
            @if (Session::has('sms'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"
                    style="
                margin: 10px 5px 10px 5px;">
                    <strong>{{ Session::get('sms') }}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (Session::has('warning'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                    style="
                margin: 10px 5px 10px 5px;">
                    <strong>{{ Session::get('warning') }}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- //display error message --}}
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="mb-4 d-flex align-items-center justify-content-between flex-wrap">
                        <a class="btn btn-sm btn-primary float-right mr-md-4 mb-md-0 mb-3"
                            href="{{ route('games.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Create New Game
                        </a>

                        {{-- search game --}}
                        <form class="mb-0" method="get">
                            <div class="float-right d-flex align-items-center">
                                <input class="form-control float-left mr-3" name="q" value="{{ request('q') }}"
                                    type="text" placeholder="search">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                 
                        <table id="style-3" class="style-3 table-hover table">
                            <thead>
                                <tr>
                                    <th class="checkbox-column text-center"> # </th>
                                    <th>Game Name</th>
                                    <th>Normal Price</th>
                                    <th>Holiday Price</th>
                                    <th>Time Based Price</th>
                                    <th>Total Booking</th>
                                    <th>Total Income</th>
                                    @if (hasAccessForManager('Edit Games'))
                                        <th>Time Price Status</th>
                                    @endif
                                    @if (hasAccessForManager('Edit Games'))
                                        <th class="text-center">Status</th>
                                    @endif
                                    @if (hasAccessForManager('Edit Games') || hasAccessForManager('Delete Games'))
                                        <th class="dt-no-sorting text-center">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gamesData as $key => $game)
                                    <tr class='clickable-row' data-href='{{ route('games.edit', $game['game']->id) }}'>
                                        <td class="checkbox-column text-center"> {{ ++$key }} </td>
                                        <td class="text-center">
                                            {{ $game['game']->name }}
                                        </td>
                                        <td class="text-center">
                                            ${{ number_format($game['game']->normal_price, 2) }}
                                        </td>
                                        <td class="text-center">
                                            ${{ number_format($game['game']->holiday_price, 2) }}
                                        </td>
                                        @if ($game['timeBasePrices'] && count($game['timeBasePrices']) > 0)
                                            <td class="text-center">
                                                <button style="text-decoration: none;" class="btn btn-link view-price-btn" data-toggle="modal"
                                                    data-target="#priceModal"
                                                    data-time-base-price={{ $game['timeBasePrices'] }}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                    </svg>
                                                    View Price
                                                </button>
                                            </td>
                                        @else
                                            <td class="text-center">N/A</td>
                                        @endif
                                        @if ($game['bookingQuantity'])
                                            <td class="text-center">{{ $game['bookingQuantity'] }}</td>
                                        @else
                                            <td class="text-center">N/A</td>
                                        @endif
                                        @if ($game['totalBookPayment'])
                                            <td class="text-center">${{ number_format($game['totalBookPayment'], 2) }}</td>
                                        @else
                                            <td class="text-center">N/A</td>
                                        @endif
                                        @if (hasAccessForManager('Edit Games'))
                                            <td class="text-center">
                                                <div class="form-switch-toggle">
                                                    <!-- Toggle Switch -->
                                                    <div
                                                        class="form-check form-switch d-flex align-items-center justify-content-center">
                                                        <input class="form-check-input time-price-checkbox" type="checkbox"
                                                            role="switch"
                                                            id="time-price-use-switch_{{ $game['game']->id }}"
                                                            data-game-id="{{ $game['game']->id }}"
                                                            {{ $game['game']->is_time_price == 1 ? 'checked' : '' }}>

                                                    </div>
                                                    <!-- Label Below -->
                                                    <div class="text-center mt-2">
                                                        <label class="form-check-label ms-2"
                                                            for="time-price-use-switch_{{ $game['game']->id }}">Use Time
                                                            Price</label>
                                                    </div>
                                                </div>

                                            </td>
                                        @endif
                                        @if (hasAccessForManager('Edit Games'))
                                            <td class="text-center">
                                                @if ($game['game']->status == '1')
                                                    <a class="badge badge-primary shadow-none status-badge"
                                                        onclick="event.preventDefault(); document.getElementById('game-status-{{ $game['game']->id }}').submit();"
                                                        style="cursor: pointer; text-decoration: none;">Active</a>
                                                @else
                                                    <a class="badge badge-warning shadow-none status-badge"
                                                        onclick="event.preventDefault(); document.getElementById('game-status-{{ $game['game']->id }}').submit();"
                                                        style="cursor: pointer; text-decoration: none;">Disabled</a>
                                                @endif
                                            </td>
                                        @endif
                                        <!-- Add a hidden form -->
                                        <form action="{{ route('game_status', $game['game']->id) }}"
                                            id="{{ 'game-status-' . $game['game']->id }}" method="get">
                                            @method('GET')
                                            @csrf
                                        </form>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                @if (hasAccessForManager('Edit Games'))
                                                    <li>
                                                        <a href="{{ route('games.edit', $game['game']->id) }}"
                                                            class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-edit-2 br-6 mb-1 p-1">
                                                                <path
                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (hasAccessForManager('Delete Games'))
                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            onclick="event.preventDefault(); if(confirm('Are you really want to delete?')){ document.getElementById('game-delete-{{ $game['game']->id }}').submit() }"
                                                            class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash br-6 mb-1 p-1">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </td>
                                        {{-- delete --}}
                                        <form method="post" action="{{ route('games.destroy', $game['game']->id) }}"
                                            id="{{ 'game-delete-' . $game['game']->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                   

                    {{ $games->appends(request()->query())->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
    @include('backend.admin.games._time_based_price')
@endsection


@section('script')

    <script src="{{ asset('admin_assets') }}/plugins/table/datatable/datatables.js"></script>
    <script>
        // var e;

        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5,
            bPaginate: false,
            paging: false,
            ordering: false,
            info: false,
            searching: false,
        });

        multiCheck(c3);
    </script>

    <script src="{{ asset('/admin_assets') }}/assets/js/games/gameList.js"></script>

@endsection
