<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    {{-- <link rel="icon" type="image/png"
        href="{{ asset('images/site-settings' . "/{$settings->id}-2.{$settings->favicon}") }}"> --}}

    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('css/global/global.css') }}">
    <link href="{{ asset('/admin_assets') }}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/admin_assets') }}/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('/admin_assets') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_assets') }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('/admin_assets') }}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('/admin_assets') }}/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />


    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css"
        integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('css/global/global.css') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- jquery cdn here --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    {{-- datepicker --}}
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


    <!-- toast message -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('style')
    <style>
        .ck.ck-balloon-panel.ck-balloon-panel_arrow_n.ck-balloon-panel_visible.ck-balloon-panel_with-arrow {
            z-index: 10000 !important;
        }

        .ck.ck-content.ck-editor__editable {
            min-height: 200px;
        }

        @media print {
            .hide-print {
                display: none !important;
            }

        }
    </style>


    <!-- toast message -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">




    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('style')
    <style>
        .ck.ck-balloon-panel.ck-balloon-panel_arrow_n.ck-balloon-panel_visible.ck-balloon-panel_with-arrow {
            z-index: 10000 !important;
        }

        .ck.ck-content.ck-editor__editable {
            min-height: 200px;
        }

        @media print {
            .hide-print {
                display: none !important;
            }

        }
    </style>


    <!-- toast message -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>


<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('frontend.include.header_top')


    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('frontend.include.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content mt-4">

            @yield('content')


        </div>
        <!--  END CONTENT AREA  -->



    </div>
    <!-- END MAIN CONTAINER -->
    @include('frontend.include.footer')

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('/admin_assets') }}/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('/admin_assets') }}/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('/admin_assets') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/admin_assets') }}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/admin_assets') }}/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('/admin_assets') }}/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('/admin_assets') }}/plugins/apex/apexcharts.min.js"></script>
    <script src="{{ asset('/admin_assets') }}/assets/js/dashboard/dash_1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- datepicker --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="{{ asset('/user_assets') }}/js/header.js"></script>


    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @yield('script')
</body>

</html>
