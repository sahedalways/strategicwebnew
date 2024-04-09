@extends('backend.layouts.master')

@section('title', 'Details booking Cancel')

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

    <div class="page-body mt-5">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
    <div class="row m-0">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4 mx-0">
                            <div class="col-xl-8">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Booking Id</th>
                                                <th>Submit Date</th>
                                                <th>Booking Date</th>
                                                <th>Time</th>
                                                <th>Game Name</th>
                                                <th>Courts</th>
                                                <th>Price</th>
                                                <th>Tax</th>
                                                <th>Booked By</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allCancelInfos as $value)
                                            <tr>
                                                <td>#{{ sprintf('%06d', $value->id) }}</td>
                                                <td>{{ date('dS M, Y', strtotime($value->updated_at)) }}</td>
                                                <td>{{ date('dS M, Y', strtotime($value->date)) }}</td>
                                                <td>{{ $value->start_time }} - {{ $value->end_time }}</td>
                                                <td>{{ $value->game_name }}</td>
                                                <td>
                                        <div class="d-flex flex-column">
                                            @php
                                                $courts = explode(',', $value->court_names);
                                            @endphp
                                            @foreach ($courts as $court)
                                                <span class="d-block p-2 shadow-sm"
                                                    style="white-space: nowrap;">{{ $court }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                                <td>${{ number_format($value->price, 2) }}</td>
                                                <td>${{ number_format($value->tax, 2) }}</td>
                                                <td>
                                                    @if ($value->booked_by == null)
                                                    Self
                                                    @else
                                                    {{ $value->booked_by_f_name }} {{ $value->booked_by_l_name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($value->status == 2)
                                                    Pending
                                                    @elseif($value->status == 3)
                                                    Approved
                                                    @else
                                                    Disapproved
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="background: #f3f3f3;" class="col-xl-4 p-3">
                                <div class="row g-4 mx-0">
                                    <div class="col-12">
                                        <div class="order-success">
                                            <h4>User Details</h4>
                                            <ul class="order-details">
                                                <li>{{ $value->user_f_name }} {{ $value->user_l_name }}</li>
                                                <li>Contact No: {{ $value->phone_number ?? 'N/A' }}</li>
                                                <li>Email: {{ $value->email ?? 'N/A' }}</li>
                                                <li>Gender:
                                                    @if ($value->gender == 1)
                                                    Male
                                                    @elseif ($value->gender == 2)
                                                    Female
                                                    @elseif ($value->gender == 3)
                                                    Other
                                                    @else
                                                    Unknown
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="order-success">
                                            <h4>Cancellation Status</h4>
                                            @if ($value->status == 2)
                                            <p>Pending</p>
                                            @elseif($value->status == 3)
                                            <p>Approved</p>
                                            @else
                                            <p>Disapproved</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <!-- Container-fluid Ends-->
    </div>
@endsection


@section('script')

@endsection
