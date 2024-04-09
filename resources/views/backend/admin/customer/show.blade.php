@extends('backend.layouts.master')

@section('title')
    Member · {{ $customer->f_name }} {{ $customer->l_name }}
@endsection

@section('content')
    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="col">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h5>{{ $customer->f_name }} {{ $customer->l_name }}</h5>
                </div>
            </div>
        </div>

        {{-- first section --}}
        <div class="row">
            <div class="col-sm-8">
                {{-- payment status --}}
                <div class="statbox widget box box-shadow m-2">
                    <div class="widget-header">
                        {{-- display success message --}}
                        @if (Session::has('sms'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('sms') }}</strong>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        {{-- display success message --}}
                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                @if ($bookingInfoCount)
                                    <h5>Total Booked: {{ $bookingInfoCount }}</h5>
                                @else
                                    <h5>Total Booked: N/A</h5>
                                @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                @if ($cancelBookingInfoCount)
                                    <h5>Cancelled Booked: {{ $cancelBookingInfoCount }}</h5>
                                @else
                                    <h5>Cancelled Booked: N/A</h5>
                                @endif

                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                @if ($totalBookPayment)
                                    <h5>Total Booked Amount: ${{ number_format($totalBookPayment, 2) }}</h5>
                                @else
                                    <h5>Total Payment: N/A</h5>
                                @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                @if ($refundBookPayment)
                                    <h5>Total Refund Amount: ${{ number_format($refundBookPayment, 2) }}</h5>
                                @else
                                    <h5>Total Refund Amount: N/A</h5>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

                        <div class="row">
                            <div class="col">

                            </div>
                        </div>

                    </div>
                </div>
                {{-- order status --}}
                <div class="statbox widget box box-shadow m-2">
                    <div class="widget-header">
                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h5>Last booking placed</h5>
                                @if ($lastCreatedAt)
                                    <p>{{ $lastCreatedAt }}</p>
                                @else
                                    <p>N/A</p>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">



                    </div>
                </div>
            </div>

            {{--  second section --}}
            <div class="col-sm-4">
                {{-- customer information --}}
                <div class="statbox widget box box-shadow m-2">
                    <div class="widget-header">
                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h5>Member Info</h5>
                            </div>
                        </div>
                    </div>

                    <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

                        <div class="row">
                            <div class="col">
                                <div>
                                    <a href="{{ route('customer.edit', $customer->id) }}">Edit Member</a>
                                </div>
                                <div>
                                    Email: <a>{{ $customer->email }}</a>
                                </div>
                                <div>
                                    Phone Number: @if ($customer->phone_number)
                                        <a href="tel:{{ $customer->phone_number }}">{{ $customer->phone_number }}</a>
                                    @else
                                        N\A
                                    @endif
                                </div>
                                <div>
                                    Gender:
                                    @if ($customer->gender == 1)
                                        Male
                                    @elseif ($customer->gender == 2)
                                        Female
                                    @elseif ($customer->gender == 3)
                                        Other
                                    @else
                                        Other
                                    @endif
                                </div>

                                <div>
                                    Account created at: {{ $customer->created_at }}
                                </div>
                                <div>
                                    User type: {{ $customer->user_type }}
                                </div>
                                <div>
                                    User status:
                                    Enabled

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection

@section('style')
    <link href="{{ asset('admin_assets') }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/select2/select2.min.css">

    <style>
        td {
            white-space: normal !important;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('admin_assets') }}/assets/js/scrollspyNav.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/custom-select2.js"></script>

    <script>
        $(document).ready(function() {
            $(".tags").select2({
                placeholder: "Find or create tags",
                allowClear: true,
                tags: true
            });
        });
    </script>
@endsection
