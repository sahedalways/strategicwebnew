@extends('backend.layouts.master')

@section('title', 'Book for Guest')

@section('content')


    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">

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
                {{-- display success message --}}
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Book for Guest</h5>
                    </div>
                </div>
            </div>


            <div style="background: #303A32;"
                class=" mx-auto my-4 offset-1 col-xl-6 col-md-10 col-sm-10 col-12 inside-booking-section">
                @include('backend.admin.include._admin_booking_section')
            </div>
        </div>
    </div>

    @include('components.message')
@endsection

@section('style')
    <link href="{{ asset('admin_assets') }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/select2/select2.min.css">
@endsection

@section('script')
    <script src="{{ asset('admin_assets') }}/assets/js/scrollspyNav.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/custom-select2.js"></script>


    <script src="{{ asset('/admin_assets') }}/assets/js/adminBooking/adminBooking.js"></script>
    <script>
        var jqOld = jQuery.noConflict();
        jqOld(function() {
            jqOld("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0, // Set the date format
                onSelect: function(dateText) {
                    // Date is selected, you can perform actions here
                    console.log("Selected date:", dateText);

                    // Example: validate the selected date
                    if (!dateText) {
                        jqOld("#date_error")
                            .removeClass("d-none")
                            .text("Please select a date.");
                    } else {
                        jqOld("#date_error").text("").addClass("d-none");
                    }
                }
            });
        });


        $(document).ready(function() {
            $('.custom-drop-1').click(function() {
                $('#dropdownMenuButton').text($(this).text());
            });
        });
    </script>
@endsection
