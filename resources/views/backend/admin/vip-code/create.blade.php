@extends('backend.layouts.master')

@section('title', 'Add VIP Codes')

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

            </div>

            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form id="my-form" class="needs-validation" action="{{ route('vip-codes.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="col">
                        <div class="form-group">
                            <label>VIP Code<sup style="color:red;"></sup></label>
                            <div class="input-group">
                                <input id="code" type="number"
                                    class="form-control @error('code') is-invalid @enderror" value="" name="code"
                                    maxlength="4">
                                <button type="button" class="btn btn-primary" onclick="generateCode()">Generate</button>
                            </div>
                            @error('code')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group mb-3">
                        <button id="submit" type="submit" class="btn btn-primary mt-3">Save</button>
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
        function generateCode() {
            // Define characters for the random code
            const characters = '0123456789';

            // Generate a 10-character random code
            let randomCode = '';
            for (let i = 0; i < 4; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomCode += characters.charAt(randomIndex);
            }

            // Update the input field with the generated code
            document.getElementById('code').value = randomCode;
        }
    </script>

@endsection
