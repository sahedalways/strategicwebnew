@extends('backend.layouts.master')

@section('title', 'Edit Cancel Status')

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

    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-body">
                            <div class="bg-inner cart-section order-details-table">
                                <div class="row g-4">
                                    <div class="col-xl-8">
                                        <!-- ... (previous code) ... -->


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
                                                            <td>
                                                                <p>#{{ sprintf('%06d', $value->id) }}</p>
                                                            </td>
                                                            <td>
                                                                <p>{{ date('dS M, Y', strtotime($value->updated_at)) }}</p>
                                                            </td>
                                                            <td>
                                                                <p>{{ date('dS M, Y', strtotime($value->date)) }}</p>
                                                            </td>
                                                            <td>
                                                                <p>{{ $value->start_time }} - {{ $value->end_time }}</p>
                                                            </td>


                                                            <td>
                                                                <p>{{ $value->game_name }}</p>
                                                            </td>


                                                            <td>
                                                                <p>{{ $value->court_names }}</p>
                                                            </td>

                                                            <td>
                                                                <p>${{ number_format($value->price, 2) }}</p>
                                                            </td>
                                                            <td>
                                                                <p>${{ number_format($value->tax, 2) }}</p>
                                                            </td>

                                                            @if ($value->booked_by == null)
                                                                <td>
                                                                    <p>Self</p>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <p>{{ $value->booked_by_f_name }}
                                                                        {{ $value->booked_by_l_name }}
                                                                    </p>
                                                                </td>
                                                            @endif
                                                            @if ($value->status == 2)
                                                                <td>
                                                                    <p>Pending</p>
                                                                </td>
                                                            @elseif($value->status == 3)
                                                                <td>
                                                                    <p>Approved</p>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <p>Disapproved</p>
                                                                </td>
                                                            @endif
                                                        </tr>

                                                </tbody>
                                            </table>
                                        </div>



                                    </div>

                                    <div class="col-xl-4">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="order-success">
                                                    <h4>User Details</h4>
                                                    <ul class="order-details">
                                                        <li>{{ $value->user_f_name }} {{ $value->user_l_name }}</li>

                                                        <li>Contact No: {{ $value->phone_number ?? 'N/A' }}
                                                        </li>
                                                        <li>Email: {{ $value->email ?? 'N/A' }}
                                                        </li>
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
                                                    <form action="{{ route('admin.cancel.update', $value->booking_id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <select name="status" class="form-control">
                                                            <?php
                                                            $list = [
                                                                3 => 'Approve',
                                                                4 => 'Disapprove',
                                                            ];
                                                            // Check if $value->status is 3 or 4
                                                            $selectedValue = $value->status == 3 ? 3 : ($value->status == 4 ? 4 : null);
                                                            ?>
                                                            @foreach ($list as $key => $statusText)
                                                                <option value="{{ $key }}"
                                                                    {{ $selectedValue == $key ? 'selected' : '' }}>
                                                                    {{ $statusText }}
                                                                </option>
                                                            @endforeach
                                                        </select>



                                                        <input type="submit" name="sub" value='Update'
                                                            class='btn btn-sm btn-success' style="margin-top: 10px">
                                                    </form>
                                                </div>
                                            </div>
                                            @endforeach
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
