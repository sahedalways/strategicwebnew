@extends('frontend.layouts.app')
@section('title', 'Sportify Book - Register')
@section('content')


    <div style="background: #ededed;" class="full-height-center-content py-4">
        <div class="m-0 row justify-content-center w-100">
            <div class="col-md-6">
                <h2 class=" text-center mb-4 primary-text-color">Hi! Welcome</h2>

                <div class="w-100 card shadow-sm">
                    <div class="card-body">

                        <form id="registerForm" method="POST" data-action="{{ route('register') }}">
                            @csrf
                            <div class="p-4">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <h4 class="primary-text-color">Login</h4>
                                    <a href="{{ route('login') }}" class="d-block text-center mt-2 small">
                                        <h6 class="m-0 primary-text-color-link">Back To Login</h6>
                                    </a>
                                </div>
                                <p class="m-0 primary-text-color">Please log in to access more content</p>
                            </div>

                            <div class="form-group border-top">
                                <div class="form-group px-4 py-2">
                                    <label class="form-label primary-text-color" for="username">First Name</label>
                                    <input id="f_name" type="text" class="form-control" name="f_name" value=""
                                        required autocomplete="name" autofocus placeholder="Type Here">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="name_error" class="error-message text-center"></div>
                            </div>

                            <div class="form-group">
                                <div class="form-group px-4 py-2">
                                    <label class="form-label primary-text-color" for="username">Last Name</label>
                                    <input id="l_name" type="text" class="form-control" name="l_name" value=""
                                        required autocomplete="name" autofocus placeholder="Type Here">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="name_error" class="error-message text-center"></div>
                            </div>

                            <div class="form-group">
                                <div class="form-group px-4 py-2">
                                    <label class="form-label primary-text-color" for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value=""
                                        required autocomplete="email" autofocus placeholder="Type Here">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="email_error" class="error-message text-center"></div>
                            </div>

                            <!-- <div class="form-group">
                                                        <div class="form-group px-4 py-2">
                                                            <label class="form-label" for="Phone-No">Phone No</label>
                                                            <input class="form-control" name="phone_number" value="127672322" type="number" id="phone_number" placeholder="Type Here">
                                                            @error('phone_number')
        <span class="text-danger">{{ $message }}</span>
    @enderror
                                                        </div>
                                                        <div id="phone_number_error" class="error-message text-center"></div>
                                                    </div> -->

                            <div class="form-group">
                                <div class="form-group px-4 py-2">
                                    <label class="form-label primary-text-color" for="password">Password</label>
                                    <input placeholder="Type Here" id="password" value="" type="password"
                                        class="form-control" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="password_error" class="error-message text-center"></div>
                            </div>

                            <div class="form-group">
                                <div class="form-group px-4 py-2">
                                    <label class="form-label primary-text-color" for="con-password">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" value=""
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Type Here">
                                </div>
                                <div id="confirm_password_error" class="error-message text-center"></div>
                            </div>

                            <div class="form-group">
                                <div class="form-group px-4 py-2">
                                    <label class="form-label primary-text-color" for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" disabled>Select an option</option>
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
                                <button type="button" class="btn custom-button-style w-75 py-2"
                                    id="register-btn">Register now</button>
                            </div>

                            <div class="text-center my-4">
                                <button hidden disabled type="button" class="btn custom-button-style w-75 py-2"
                                    id="loadingSubmittingBtn">
                                    <i class="fa fa-spinner fa-spin me-3"></i> Registering
                                </button>
                            </div>
                        </form>


                    </div>
                </div>


            </div>
        </div>


    </div>

@endsection
