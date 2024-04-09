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

                    <form action="{{ route('site-setting.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-lg-7 col-md-7 col-sm-12">

                                <div class="col">
                                    <div class="form-group">
                                        <label>Site Title<sup style="color:red;">(*)</sup></label>

                                        <input name="site_title"
                                            value="{{ old('site_title', $siteSettings->site_title ?? '') }}"
                                            placeholder="Ex. Sportify Book" id="site_title"
                                            class="form-control @error('site_title') is-invalid @enderror" type="text">
                                        @error('site_title')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label>Logo Image<sup style="color:red;">(*)</sup></label>

                                        <input class="form-control" id="logo_image" name="logo_image" type="file"
                                            accept="image/jpeg, image/png, image/jpg, image/gif">

                                        @if (!empty($siteSettings->logo_image))
                                            <img id="logo_image_preview"
                                                src="{{ asset('images/site-settings' . "/{$siteSettings->id}-1.{$siteSettings->logo_image}") ?? 'logo_image_preview' }}"
                                                style="width: 100px" width="10">
                                        @endif
                                        @error('logo_image')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label>Favicon<sup style="color:red;">(*)</sup></label>
                                        <input class="form-control" id="favicon" name="favicon" type="file"
                                            accept="image/jpeg, image/png, image/jpg, image/gif">

                                        @if (!empty($siteSettings->favicon))
                                            <img id="favicon_preview"
                                                src="{{ asset('images/site-settings' . "/{$siteSettings->id}-2.{$siteSettings->favicon}") ?? 'favicon_preview' }}"
                                                style="width: 100px" width="10">
                                        @endif
                                        @error('favicon')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label>Copyright Name<sup style="color:red;">(*)</sup></label>

                                        <input name="copyright_name"
                                            value="{{ old('copyright_name', $siteSettings->copyright_name ?? '') }}"
                                            placeholder="Ex. Sportify Book" id="copyright_name"
                                            class="form-control @error('copyright_name') is-invalid @enderror"
                                            type="text">
                                        @error('copyright_name')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <label>Contact Us Information<sup style="color:red;">(*)</sup></label>

                                        <textarea name="contact_us" id="contact_us" class="form-control @error('contact_us') is-invalid @enderror"
                                            placeholder="Ex. Company contact information">{{ old('contact_us', $siteSettings->contact_us ?? '') }}</textarea>
                                        @error('contact_us')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>





                                <div class="col">
                                    <div class="form-group mb-3">
                                        <button id="submit" type="submit" class="btn btn-primary mt-3">Update</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
            </form>
        </div>

    </div>
    </div>

@endsection


@section('style')
@endsection

@section('script')
    <script>
        // Initialize image previews
        function initializeImagePreview(inputId, previewId, defaultSrc) {
            var input = document.getElementById(inputId);
            var preview = document.getElementById(previewId);

            input.addEventListener('change', function(event) {
                var file = event.target.files[0];

                if (file) {
                    preview.src = URL.createObjectURL(file);
                } else {
                    preview.src = defaultSrc;
                }
            });
        }

        initializeImagePreview('logo_image', 'logo_image_preview',
            '{{ $siteSettings->logo_image ?? 'default_logo_image_preview' }}');
        initializeImagePreview('favicon', 'favicon_preview', '{{ $siteSettings->favicon ?? 'default_favicon_preview' }}');
    </script>


    <script src="{{ asset('/admin_assets') }}/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
            .then(editor2 => {
                window.editor2 = editor2;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>

@endsection
