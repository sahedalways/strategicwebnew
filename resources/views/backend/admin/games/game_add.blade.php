@extends('backend.layouts.master')

@section('title', 'Create New Game')

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
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Create New Game</h5>
                        <a class="btn btn-sm btn-primary float-right mb-3" href="{{ route('games.index') }}">
                            <i class="fas fa-list"></i> Game List
                        </a>
                    </div>
                </div>
            </div>


            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form id="my-form" class="needs-validation" action="{{ route('games.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Game Name<sup style="color:red;">(*)</sup></label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="ex. Cricket"
                                    value="{{ old('name') }}" name="name" required>
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Normal Price<sup style="color:red;">(*)</sup></label>
                                <input id="normal_price" type="text"
                                    class="form-control @error('normal_price') is-invalid @enderror"
                                    value="{{ old('normal_price') }}" placeholder="ex. 10.00" name="normal_price" required>
                                @error('normal_price')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Holiday Price<sup style="color:red;">(*)</sup></label>
                                <input id="holiday_price" type="text"
                                    class="form-control @error('holiday_price') is-invalid @enderror"
                                    value="{{ old('holiday_price') }}" placeholder="ex. 20.00" name="holiday_price"
                                    required>
                                @error('holiday_price')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="is_time_price">Allow Time-based Price?</label>
                        <div class="form-check">
                            <input id="is_time_price" class="form-check-input" type="checkbox" name="is_time_price"
                                value="1" {{ old('is_time_price') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_time_price">Yes</label>
                        </div>
                    </div>


                    <div id="timeFields">


                    </div>
                    <button id="addTimeAreaButton" type="button" class="btn btn-outline-primary" hidden>Add Row</button>




                    <div class="my-4">
                        <!-- Display added courts -->
                     <div class="form-group">
                     <label>Courts<sup style="color:red;">(*)</sup></label>

                    <div id="courts-container">
                     </div>

                        </div>
                        <button id="addCourtsButton" type="button" class="btn btn-outline-primary">Add Row</button>
                    </div>
                    @error('courts')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror


                    <div class="form-group mb-3">
                        <button id="submit" type="submit" class="btn btn-primary mt-3">Submit</button>
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


    <script src="{{ asset('/admin_assets') }}/ckeditor/classic/ckeditor.js"></script>
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


        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener("keyup", function(e) {
            slug.value = rep(e.target.value, " ", "-")
        });

        document.getElementById('image').addEventListener('change', function(event) {
            var preview = document.getElementById('image-preview');
            var file = event.target.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            } else {
                preview.src = '{{ 'default_image_url' }}';
            }
        });
    </script>

    <script src="{{ asset('/admin_assets') }}/assets/js/games/addGame.js"></script>

@endsection
