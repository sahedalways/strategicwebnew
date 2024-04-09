@extends('backend.layouts.master')

@section('title', 'Add user')



@section('content')

    <div class="row layout-spacing mt-3 mx-0">



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            {{-- display success message --}}
            @if (Session::has('sms'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('sms') }}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- end display success message --}}
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-lg-7 col-md-7 col-sm-12">



                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="name" value="{{ old('name') }}" placeholder="Name" id="name"
                                            class="form-control @error('name') is-invalid @enderror" type="text">
                                        @error('name')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" value="{{ old('email') }}" placeholder="Email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" type="email">
                                        @error('email')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" placeholder="Password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" type="text">

                                        @error('password')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input name="password_confirmation" placeholder="Confirm Password"
                                            id="password_confirmation" class="form-control" type="text">
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other</option>
                                        </select>

                                        @error('gender')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input name="phone_number" placeholder="Phone Number" id="phone_number"
                                            class="form-control @error('phone_number') is-invalid @enderror" type="number">
                                        @error('phone_number')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col">
                                    <div class="form-group">
                                        <label>Referral Code<sup style="color:red;"></sup></label>
                                        <div class="input-group">
                                            <input id="referral_code" type="text"
                                                class="form-control @error('referral_code') is-invalid @enderror"
                                                value="" name="referral_code" pattern="[A-Za-z0-9]{1,10}">
                                            <button type="button" class="btn btn-primary"
                                                onclick="generateReferralCode()">Generate</button>
                                        </div>
                                        @error('referral_code')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="type">User type</label>
                                        <?php
                                        $types = [
                                            'admin' => 'Admin',
                                            'agent' => 'agent',
                                            'user' => 'User',
                                        ];
                                        ?>
                                        <select class="form-control" name="user_type" id="user_type">
                                            <option value="" disabled>Select role type</option>
                                            @foreach ($types as $key => $value)
                                                <option value="{{ $key }}"
                                                    @if ($key == 'user') selected @endif>{{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group mb-3">
                                        <button id="submit" type="submit" class="btn btn-primary mt-3">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection


@section('style')
@endsection

@section('script')
    <script>
        function generateReferralCode() {
            // Define characters for the random code
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

            // Generate a 10-character random code
            let randomCode = '';
            for (let i = 0; i < 10; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomCode += characters.charAt(randomIndex);
            }

            // Update the input field with the generated code
            document.getElementById('referral_code').value = randomCode;
        }
    </script>
@endsection
