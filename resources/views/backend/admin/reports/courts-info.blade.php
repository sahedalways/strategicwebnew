@extends('backend.layouts.master')

@section('title', 'Booking Status')

@section('style')

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/custom_dt_custom.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endsection

<style>
    .custom-bg-header {
        background: lightgray;
    }
</style>

@section('content')
    <div class="custom-bg-header p-4">
        <div
            class="btn-group btn-group-justified align-items-center justify-content-center w-100 m-0 flex-md-row flex-column">
            <h4 class="text-center mb-0 text-primary">BOOKING STATUS</h4>
            <div class="icon-wrapper d-flex align-items-center ms-3 mt-md-0 mt-3">
                <div class="d-flex align-items-center ml-3">
                    <i class="fa-solid fa-square text-danger mx-2"></i>
                    <span>Unoccupied</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-square text-primary mx-2"></i>
                    <span>Occupied</span>
                </div>
            </div>
        </div>
        <br>
        <form class="d-flex flex-lg-row flex-column justify-content-center mt-3">

            <div class="row justify-content-end align-items-center">
                <div class="col-md-3">

                    <label style="white-space: nowrap;" for="gameName" class="">Game Name:</label>
                    <select class="form-control p-1" id="game_name" name="game_name" required>
                        <option value="" disabled selected>Select a game</option>
                        @foreach ($games as $game)
                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <label>Start Date</label>
                    <input type="text" autocomplete="off" name="start_date" class="form-control date-input"
                        id="start_date" required>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <label>End Date</label>
                    <input type="text" autocomplete="off" name="end_date" class="form-control date-input" id="end_date"
                        required>
                </div>

                <div class="col-md-3">
                    <label for="">&nbsp;</label>
                    <input type="submit" name="search" value="Search" class="form-control btn btn-primary">
                </div>
            </div>


        </form>
    </div>
    <div class="row mx-auto mt-3 table-responsive">

        @if (request()->has('game_name') && request()->has('search'))

            <div>
                @if (request()->has('game_name'))
                    @foreach ($games as $game)
                        @if ($game->id == request()->input('game_name'))
                            <p class="text-center mt-3 mb-3">Report showing for {{ $game->name }}</p>
                        @endif
                    @endforeach
                @endif

                @if (request()->has('start_date') && request()->has('end_date'))
                    <p class="text-center mt-3 mb-3">Date range: {{ request()->input('start_date') }} to
                        {{ request()->input('end_date') }}</p>
                @elseif (request()->has('start_date'))
                    <p class="text-center mt-3 mb-3">Date: {{ request()->input('start_date') }}</p>
                @elseif (request()->has('end_date'))
                    <p class="text-center mt-3 mb-3">Date: {{ request()->input('end_date') }}</p>
                @else
                    <p class="text-center mt-3 mb-3">No date range specified</p>
                @endif


                <table class="table">
                    <thead class="text-center border-dark sticky-top">
                        <tr>
                            @foreach ($courts as $court)
                                <th scope="col">{{ $court->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="text-center fw-normal">
                        @foreach ($availableTimeSlots as $timeSlot)
                            <tr>
                                @foreach ($courts as $court)
                                    @php
                                        $occupied = false;
                                        $statusIcon = '<i class="fa-solid fa-square text-danger ms-2"></i>';

                                        foreach ($occupiedTimeSlots as $occupiedSlot) {
                                            if (
                                                $occupiedSlot['court_id'] == $court->id &&
                                                $occupiedSlot['time'] == $timeSlot
                                            ) {
                                                $occupied = true;
                                                break;
                                            }
                                        }

                                        if ($occupied) {
                                            $statusIcon = '<i class="fa-solid fa-square text-primary ms-2"></i>';
                                        }
                                    @endphp
                                    <td>{{ $timeSlot }} {!! $statusIcon !!}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center">Please search by selecting game name and date.</p>
        @endif
    </div>




@endsection


@section('script')

    <script>
        $(function() {
            $("#start_date, #end_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                onSelect: function(dateText) {
                    $('#start_date').removeAttr('required');
                    $('#end_date').removeAttr('required');
                },
            });
        });
    </script>


@endsection
