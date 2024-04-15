@extends('frontend.layouts.app')
@section('title', 'Strategic Web - Login')
@section('content')

    <style>
        .form-group input {
            background: #ededed;
        }

        .card-body {
            background: #303A32;
        }

        .nav-link {
            background: #17221a;
            color: #a35b10 !important;
        }

        .nav-link.active {
            background: #809f86 !important;
            color: #fff !important;
        }

        .nav-link {
            color: #fff;
        }

        .form-group input {
            background: #809f86;
        }
    </style>

    <div style="background: #ededed;" class="full-height-center-content">

        <div class="row justify-content-center align-items-center w-100 mb-5">
            {{-- <div class="d-flex justify-content-center my-5">
                @if ($settings->logo_image)
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('images/site-settings' . "/{$settings->id}-1.{$settings->logo_image}") }}"
                            alt="sportify-logo" style="width: 110px">
                    </a>
                @endif
            </div> --}}
            <div class="col-md-6">
                @if (session('message'))
                    <div class="alert alert-warning">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body p-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link{{ request()->routeIs('login') ? ' active' : '' }}" id="top-profile-tab"
                                    id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                                    aria-selected="{{ request()->routeIs('login') ? 'true' : 'false' }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ request()->routeIs('register.tab') ? ' active' : '' }}"
                                    id="register-tab" data-toggle="tab" href="#register" role="tab"
                                    aria-controls="register"
                                    aria-selected="{{ request()->routeIs('register.tab') ? 'true' : 'false' }}">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade {{ request()->routeIs('login') ? ' show active' : '' }}"
                                id="login" role="tabpanel" aria-labelledby="login-tab">
                                <form id="loginForm" class="custom-form-bg w-100" method="POST"
                                    data-action="{{ route('login') }}">
                                    @csrf
                                    <div class="p-3 py-2">
                                        <div class="d-flex w-100 align-items-center justify-content-between">
                                            <h4 class="primary-text-color">{{ __('Login') }}</h4>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="px-4 py-2">
                                            <label class="fw-semibold primary-text-color form-label"
                                                for="email">Email</label>
                                            <input id="email" type="email"
                                                class="p-2 form-control w-100  no-outline @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder="Type email address">
                                        </div>
                                        @error('email')
                                            <span class="px-4 invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                        <div id="email_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class=" px-4 py-2">
                                            <label class="fw-semibold form-label primary-text-color"
                                                for="password">Password</label>
                                            <input placeholder="Type password" id="password" type="password"
                                                class="p-2 form-control w-100  no-outline @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                        </div>
                                        @error('password')
                                            <span class="px-4 invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                        <div id="password_error" class="error-message text-center"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="px-4 py-2">
                                            <input type="checkbox" id="remember_me" name="remember_me">
                                            <label class="primary-text-color" style="cursor: pointer;"
                                                for="remember_me">Remember Me</label>

                                        </div>
                                    </div>
                                    <div class="text-center my-4">
                                        <button id="login-btn" type="button"
                                            class="btn custom-button-style col-md-5 py-2">Login now</button>
                                    </div>

                                    <div class="text-center my-4"><button hidden disabled type="button"
                                            class="btn custom-button-style col-md-5 py-2" id="loadingSubmittingBtn"> <i
                                                class="fa fa-spinner fa-spin me-3"></i>
                                            Loging</button></div>

                                    <div class="text-center">
                                        <a class="link-warning" href="{{ route('password.request') }}">Forgot password?</a>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade {{ request()->routeIs('register.tab') ? ' show active' : '' }}"
                                id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form id="registerForm" method="POST" data-action="{{ route('register') }}">
                                    @csrf
                                    <div class="p-3 py-2">

                                        <h4 class="primary-text-color">Register</h4>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="name">Name</label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="" required autocomplete="name" autofocus
                                                placeholder="Type your name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="name_error" class="error-message text-center"></div>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="registerEmail">Email</label>
                                            <input id="registerEmail" type="email" class="form-control"
                                                name="registerEmail" value="" required autocomplete="email"
                                                autofocus placeholder="Type email address">
                                            @error('registerEmail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="register_email_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="Phone-No">Phone No</label>
                                            <input class="form-control" name="phone_number" value=""
                                                type="number" id="phone_number" placeholder="Type phone number">
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="phone_number_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="password">Password</label>
                                            <input placeholder="Type password" id="registerPassword" value=""
                                                type="password" class="form-control" name="registerPassword" required
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div id="register_password_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="con-password">Confirm
                                                Password</label>
                                            <input id="password_confirmation" type="password" class="form-control"
                                                value="" name="password_confirmation" required
                                                autocomplete="new-password" placeholder="Type confirm password">
                                        </div>
                                        <div id="confirm_password_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="gender">Gender</label>
                                            <select style="background: #809f86;" name="gender" id="gender"
                                                class="form-control">
                                                <option value="" disabled>Select your gender</option>
                                                <option selected value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-center my-4">
                                        <button type="button" class="btn custom-button-style col-md-5 py-2"
                                            id="register-btn">Register now</button>
                                    </div>

                                    <div class="text-center my-4">
                                        <button hidden disabled type="button"
                                            class="btn custom-button-style col-md-5 py-2" id="loadingRegisteringBtn">
                                            <i class="fa fa-spinner fa-spin me-3"></i> Registering
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="{{ asset('/user_assets') }}/js/login.js"></script>
        <script src="{{ asset('/user_assets') }}/js/register.js"></script>

    </div>

@endsection
