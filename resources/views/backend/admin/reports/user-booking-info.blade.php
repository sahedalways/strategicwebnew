@extends('backend.layouts.master')

@section('title', 'User Booking Report')

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

<div class="row layout-spacing mt-3 mx-0">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

        {{-- display error message --}}
        @if (Session::has('sms'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="
                margin: 10px 5px 10px 5px;">
            <strong>{{ Session::get('sms') }}</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif (Session::has('warning'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="
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


                    {{-- search game --}}
                    <form class="mb-0" method="get">
                        <div class="float-right d-flex align-items-center">
                            <input class="form-control float-left mr-3" name="q" value="{{ request('q') }}" type="text" placeholder="search by user name">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>


                <table id="style-3" class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="checkbox-column text-center">#</th>
                            <th>User Name</th>
                            <th>Total Booking</th>
                            <th>Total Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allUserInfo as $key => $item)
                        <tr class="clickable-row">
                            <td class="checkbox-column text-center">{{ ++$key }}</td>
                            <td>{{ $item->f_name }} {{ $item->l_name }}</td>
                            <td>{{ $item->total_quantity }}</td>
                            @if ($item->total_price)
                            <td>${{ number_format($item->total_price, 2) }}</td>
                            @else
                            <td class="text-center">N/A</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                {{ $allUserInfo->appends(request()->query())->links('pagination::bootstrap-4') }}

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



@endsection