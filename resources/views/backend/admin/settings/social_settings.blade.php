@extends('backend.layouts.master')

@section('title', 'Site Settings')
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

                    <form action="{{ route('social-setting.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-lg-7 col-md-7 col-sm-12">

                                <div class="col">
                                    <div class="form-group">
                                        <label>Whatsapp Number<sup style="color:red;">(*)</sup></label>

                                        <input name="whatsapp_number"
                                            value="{{ old('site_title', $siteSettings->whatsapp_number ?? '') }}"
                                            placeholder="Ex. +8802173638332" id="whatsapp_number"
                                            class="form-control @error('whatsapp_number') is-invalid @enderror"
                                            type="text">
                                        @error('whatsapp_number')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <button id="submit" type="submit" class="btn btn-primary mt-3">Update</button>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
            </form>
        </div>

    </div>



@endsection


@section('style')
@endsection

@section('script')


@endsection
