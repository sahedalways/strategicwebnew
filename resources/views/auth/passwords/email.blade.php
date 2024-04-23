@extends('frontend.layouts.app')
{{-- @section('title', $settings->site_title . ' - Forgot Password') --}}

@section('content')
    <div style="background: #ededed">
        <div class="container">
            <div class="d-flex justify-content-center pt-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/main-logo.png') }}" alt="Logo" class="loginLogo">
                </a>
            </div>
            <div class="row justify-content-center full-height-center-res">
                {{-- <div class="d-flex justify-content-center my-5">
                    @if ($settings->logo_image)
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('images/site-settings' . "/{$settings->id}-1.{$settings->logo_image}") }}"
                                alt="sportify-sport-logo" style="width: 110px">
                        </a>
                    @endif
                </div> --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header fw-semibold">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="w-100 d-flex justify-content-center">
                                        <button type="submit" class="btn custom-button-style">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
