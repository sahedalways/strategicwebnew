@extends('backend.layouts.master')

@section('title', 'Update Member')



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

                    <form action="{{ route('customer.update', $customer->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-lg-7 col-md-7 col-sm-12">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="type">User type</label>
                                        <?php
                                        $types = [
                                            'admin' => 'Admin',
                                            'manager' => 'Manager',
                                            'user' => 'User',
                                        ];
                                        ?>
                                        <select class="form-control" name="user_type" id="user_type">
                                            <option value="">Select role type</option>
                                            @foreach ($types as $key => $value)
                                                <option value="{{ $key }}"
                                                    @if ($customer->user_type == $key) selected @endif>{{ $value }}
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
                                        <button id="submit" type="submit" class="btn btn-primary mt-3">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="col">
                        <form action="{{ route('customer.destroy', $customer->id) }}" id="user_destroy" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="form-group mb-3">
                                <button
                                    onclick="event.preventDefault();
                                    if(confirm('Are you really want to delete order, this cannot be undone ?')){
                                        document.getElementById('user_destroy').submit()
                                    }"
                                    class="btn btn-outline-danger mt-3">Delete</button>
                            </div>
                        </form>
                    </div>

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
