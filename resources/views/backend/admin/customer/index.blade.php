@extends('backend.layouts.master')

@section('title')
    Members
@endsection

@section('style')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/custom_dt_custom.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <style>
        tr.clickable-row {
            cursor: pointer;
        }
    </style>
@endsection



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

                    <div class="mb-4 d-flex align-items-center justify-content-end flex-wrap">
                        {{-- <a class="btn btn-sm btn-primary float-right mr-md-4 mb-md-0 mb-3"
                            href="{{ route('customer.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Add user
                        </a> --}}


                        {{-- search user --}}
                        <form method="get">
                            <div class="float-right d-flex align-items-center">
                                <input class="form-control float-left mr-3" name="q" value="{{ request('q') }}"
                                    type="text" placeholder="search">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table id="style-3" class="style-3 table-hover table">
                            <thead>
                                <tr>
                                    <th class="checkbox-column text-center"> # </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created Date</th>
                                    <th class="text-center">User Type</th>
                                    <th class="text-center">Total Booking</th>
                                    <th class="text-center">Total Payment</th>
                                    <th class="dt-no-sorting text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customerData as $key => $customer)
                                    <tr class='clickable-row'
                                        data-href='{{ route('customer.show', $customer['customer']->id) }}'>
                                        <td class="checkbox-column text-center"> {{ ++$key }} </td>

                                        <td>{{ $customer['customer']->f_name }} {{ $customer['customer']->l_name }}</td>
                                        <td>{{ $customer['customer']->email }}</td>

                                        <td>{{ date('d-M-Y', strtotime($customer['customer']->created_at)) }}</td>

                                        <td class="text-center">{{ $customer['customer']->user_type }}</td>


                                        @if ($customer['bookingQuantity'])
                                            <td class="text-center">{{ $customer['bookingQuantity'] }}</td>
                                        @else
                                            <td class="text-center">N/A</td>
                                        @endif


                                        @if ($customer['totalBookPayment'])
                                            <td class="text-center">{{ number_format($customer['totalBookPayment'], 2) }}
                                            </td>
                                        @else
                                            <td class="text-center">N/A</td>
                                        @endif

                                        <td class="text-center">
                                            <ul class="table-controls">

                                                <li>

                                                    <a href="{{ route('customer.show', $customer['customer']->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            class="bs-tooltip" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="View" height="16"
                                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 8s4-5.5 8-5.5 8 5.5 8 5.5-4 5.5-8 5.5S0 8 0 8zm1 0a9 9 0 0 0 16 0 9 9 0 0 0-16 0z" />
                                                            <path
                                                                d="M8 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm1 0a3.5 3.5 0 1 0-7 0 3.5 3.5 0 0 0 7 0z" />
                                                        </svg>

                                                    </a>
                                                    @if (hasAccessForManager('Edit Members'))
                                                        <a href="{{ route('customer.edit', $customer['customer']->id) }}"
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
                                                    @endif
                                                </li>

                                                @if (hasAccessForManager('Delete Members'))
                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            onclick="event.preventDefault();
                                                if(confirm('Are you really want to delete?')){
                                                document.getElementById('customer-delete-{{ $customer['customer']->id }}').submit()
                                                }"
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

                                        {{-- delete  --}}
                                        <form method="post"
                                            action="{{ route('customer_destroy', $customer['customer']->id) }}"
                                            id="{{ 'customer-delete-' . $customer['customer']->id }}">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                        </form>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $customers->appends(request()->query())->links('pagination::bootstrap-4') }}

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
        // jQuery(document).ready(function($) {
        //     $(".clickable-row").click(function(event) {
        //         window.location = $(this).data("href");
        //     });
        // });
    </script>
@endsection
