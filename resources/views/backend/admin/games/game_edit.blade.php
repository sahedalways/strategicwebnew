@extends('backend.layouts.master')

@section('title', 'Edit Game')

@section('content')
    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">

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

            </div>

            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form action="{{ route('games.update', $game) }}" method="post" enctype="multipart/form-data"
                    id="gameForm">
                    @csrf
                    @method('PUT')

                    <input type="text" id="courtsArray" value={{ $courts }} hidden>
                    @if ($game->is_time_price)
                        <input type="number" id="time_price_exist" value={{ $game->is_time_price }} hidden>
                    @endif
                    <input type="text" id="time_prices_arr" value={{ $timePrices }} hidden>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Game Name<sup style="color:red;">(*)</sup></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="ex. Cricket" value="{{ $game->name }}" name="name">

                        <div class="alert alert-danger mt-1 error-msg" id="name-error" hidden></div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Normal Price<sup style="color:red;">(*)</sup></label>
                        <input id="normal_price" type="text"
                            class="form-control @error('normal_price') is-invalid @enderror"
                            value="{{ number_format($game->normal_price, 2) }}" placeholder="ex. 10.00" name="normal_price"
                            required>
                        <div class="alert alert-danger mt-1 error-msg" id="normal-price-error" hidden></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Holiday Price<sup style="color:red;">(*)</sup></label>
                        <input id="holiday_price" type="text"
                            class="form-control @error('holiday_price') is-invalid @enderror"
                            value="{{ number_format($game->holiday_price, 2) }}" placeholder="ex. 20.00"
                            name="holiday_price" required>
                        <div class="alert alert-danger mt-1 error-msg" id="holiday-price-error" hidden></div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="is_time_price">Allow Time-based Price?</label>
                <div class="form-check">
                    <input id="is_time_price" class="form-check-input" type="checkbox" name="is_time_price" value="1"
                        {{ old('is_time_price') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_time_price">Yes</label>
                </div>
            </div>



            <div id="timeFields">


            </div>
            <button id="addTimeAreaButton" type="button" class="btn btn-outline-primary" hidden>Add Row</button>




            <div class="my-4">
                <!-- Display added courts -->
                <label>Courts<sup style="color:red;">(*)</sup></label>

                <div id="courts-container">

                </div>
                <button id="addCourtsButton" type="button" class="btn btn-outline-primary">Add Row</button>
            </div>
            <div class="alert alert-danger mt-1 error-msg" id="courts-error" hidden></div>


            <div class="form-group mb-3">
                <button type="button" id="submitButton" class="btn btn-primary mt-3">Update</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('style')
    <link href="{{ asset('admin_assets') }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/select2/select2.min.css">
@endsection

@section('script')
    <script src="{{ asset('admin_assets') }}/assets/js/scrollspyNav.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/custom-select2.js"></script>

    <script>
        $(document).ready(function() {
            $("#select2").select2();
        });
    </script>

    <script src="{{ asset('/admin_assets') }}/assets/js/games/editGame.js"></script>

@endsection
