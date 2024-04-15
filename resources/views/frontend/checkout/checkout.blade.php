@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('style')

@endsection

@php
    $requestData = session()->get('requestData');
@endphp

@section('content')
    <div class="row layout-spacing mt-3 mx-0 mx-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="container">
                @if (Session::has('sms'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                        style="
                margin: 10px 5px 10px 5px;">
                        <strong>{{ Session::get('sms') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"
                        style="
                margin: 10px 5px 10px 5px;">
                        <strong>{{ Session::get('error') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h4 style="font-weight: 600;" class="text-center my-3">Checkout</h4>
                <form action="{{ route('stripe') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row mx-0">
                        <div class="table-responsive table-details card mb-4">
                            <table class="table cart-table card-body mb-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Game Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Courts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-order border-bottom border-secondary">
                                        <td>{{ $requestData['date'] }}</td>
                                        <td>{{ $requestData['gameName'] }}</td>
                                        <td>{{ $requestData['start_time'] }}</td>
                                        <td>{{ $requestData['end_time'] }}</td>
                                        <td>{{ implode(', ', $requestData['courtNames']->toArray()) }}</td>
                                    </tr>
                                    <!-- Add more rows here if needed -->
                                </tbody>
                            </table>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr class="table-order">
                                        <td colspan="1">
                                            <h6 class="mb-0">Subtotal :</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                ${{ number_format($requestData['game_price'] - $requestData['tax'], 2) }}
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr class="table-order">
                                        <td colspan="1">
                                            <h6 class="mb-0">Tax (HST) :</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">${{ number_format($requestData['tax'], 2) }}</h6>
                                        </td>
                                    </tr>
                                    <tr class="table-order">
                                        <td colspan="1">
                                            <h6 class="theme-color fw-bold">Total Price :</h6>
                                        </td>
                                        <td>
                                            <h6 class="theme-color fw-bold">
                                                ${{ number_format($requestData['game_price'], 2) }}</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="my-4 w-100 text-center">
                            <!-- Add hidden input fields to pass data -->
                            <input type="hidden" name="date" value="{{ $requestData['date'] }}">
                            <input type="hidden" name="gameName" value="{{ $requestData['gameName'] }}">
                            <input type="hidden" name="start_time" value="{{ $requestData['start_time'] }}">
                            <input type="hidden" name="end_time" value="{{ $requestData['end_time'] }}">
                            <input type="hidden" name="courtNames"
                                value="{{ implode(',', $requestData['courtNames']->toArray()) }}">
                            <input type="hidden" name="subtotal"
                                value="{{ $requestData['game_price'] - $requestData['tax'] }}">
                            <input type="hidden" name="tax" value="{{ $requestData['tax'] }}">
                            <input type="hidden" name="total_price" value="{{ $requestData['game_price'] }}">
                            <input type="hidden" name="game_id" value="{{ $requestData['game_name'] }}">
                            <input type="hidden" name="court_ids" value="{{ implode(',', $requestData['court_ids']) }}">


                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary col-md-5">Continue to checkout</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
