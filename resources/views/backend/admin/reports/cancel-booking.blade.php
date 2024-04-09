@extends('backend.layouts.master')

@section('title', 'Cancel booking Reports')

@section('style')

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/custom_dt_custom.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endsection

<style>
    td {
        white-space: normal !important;
    }
</style>

@section('content')

    <div class="row layout-spacing mt-3 mx-0 mx-0">
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
                    <form class="" action="" method="get">
                        <div class="card-body p-0 order-datatable">
                            <div style="padding: .5rem" id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <div class="row justify-content-end">
                                    <div class="col-md-2">
                                        <label>Start Date</label>
                                        <input type="text" autocomplete="off" name="start_date" class="form-control"
                                            id="start_date">
                                    </div>
                                    <div class="col-md-2">
                                        <label>End Date</label>
                                        <input type="text" autocomplete="off" name="end_date" class="form-control"
                                            id="end_date">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">&nbsp;</label>
                                        <input type="submit" name="search" value="Search"
                                            class="form-control btn btn-primary">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>



                    <table id="style-3" class="style-3 table-hover table">
                        <thead>
                            <tr>
                                <th>Booking Id</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Game Name</th>
                                <th>Courts</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Booked By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCancelInfo as $item)
                                <tr class='clickable-row'>
                                    <td class="sorting_1">#{{ sprintf('%06d', $item->id) }}</td>
                                    <td>{{ date('dS M, Y', strtotime($item->updated_at)) }}</td>
                                    <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
                                    <td>{{ $item->game_name }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            @php
                                                $courts = explode(',', $item->court_names);
                                            @endphp
                                            @foreach ($courts as $court)
                                                <span class="d-block p-2 shadow-sm"
                                                    style="white-space: nowrap;">{{ $court }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->tax, 2) }}</td>
                                    @if ($item->booked_by == null)
                                        <td>Self</td>
                                    @else
                                        <td>{{ $item->f_name }} {{ $item->l_name }}</td>
                                    @endif

                                    @if ($item->status == 2)
                                        <td>
                                            Pending
                                        </td>
                                    @elseif($item->status == 3)
                                        <td>
                                            Approved
                                        </td>
                                    @else
                                        <td>
                                            Disapproved
                                        </td>
                                    @endif
                                    <td>
                                        <div>
                                            <form style="display: flex;" method="POST">
                                                <a target="_blank"
                                                    href="{{ route('admin.cancel.edit', $item->booking_id) }}"
                                                    style="margin-right: 8px" class="btn edit-btn-style btn-sm">Edit</a>
                                                @csrf
                                                @method('POST')
                                                <a target="_blank"
                                                    href="{{ route('admin.cancel.details', $item->booking_id) }}"
                                                    type="submit" class="btn btn-primary btn-sm">Details</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    {{ $allCancelInfo->appends(request()->query())->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
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

    <script>
        $(function() {
            $("#start_date, #end_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        });
    </script>

@endsection
