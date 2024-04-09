@extends('frontend.layouts.dashboard_master')

@section('title', 'Password Settings')



@section('content')

    <div class="row layout-spacing mx-0">
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

                    <form action="{{ route('change-password.update', auth()->user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Current Password<sup style="color:red;">(*)</sup></label>
                                    <div class="input-group">
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            value="" placeholder="Current password" name="current_password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text current-password-toggle">
                                                <i class="fas fa-eye-slash toggle-icon"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('current_password')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>New Password<sup style="color:red;">(*)</sup></label>
                                    <div class="input-group">
                                        <input id="new_password" type="password"
                                            class="form-control @error('new_password') is-invalid @enderror" value=""
                                            placeholder="New password" name="new_password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text new-password-toggle">
                                                <i class="fas fa-eye-slash toggle-icon"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('new_password')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Confirm New Password<sup style="color:red;">(*)</sup></label>
                                    <div class="input-group">
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            value="" placeholder="Confirm new password" name="password_confirmation"
                                            required>
                                        <div class="input-group-append">
                                            <span class="input-group-text confirm-password-toggle">
                                                <i class="fas fa-eye-slash toggle-icon"></i>
                                            </span>
                                        </div>
                                    </div>

                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group mb-3">
                                        <button id="submit" type="submit" class="btn btn-primary mt-3">Change
                                            Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>


                    </form>
                </div>

            </div>
        </div>


    </div>

@endsection


@section('style')
@endsection

@section('script')
    <script src="{{ asset('/admin_assets') }}/assets/js/password/password.js"></script>
@endsection
