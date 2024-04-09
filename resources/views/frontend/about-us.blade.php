@extends('frontend.layouts.master')
@section('title', $settings->site_title . ' - About Us')

@section('content')
    <div class="">
        <div class="banner">
            <img src="{{ asset('img/banner-5.jpg') }}" class="d-block w-100" alt="banner-3">
            <h1 class="display-4 custom-position-title">About Us</h1>
        </div>
        <div class="container my-4">

            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec justo at augue porta
                facilisis sit amet eu justo. Mauris molestie elit at turpis ullamcorper pretium. Sed lacinia eros id
                dolor posuere lacinia.</p>
            <hr class="my-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec justo at augue porta facilisis sit amet
                eu justo. Mauris molestie elit at turpis ullamcorper pretium. Sed lacinia eros id dolor posuere lacinia.
                Nulla in metus enim. Aliquam erat volutpat. Vivamus viverra mi quis quam congue, non rutrum velit
                volutpat. Pellentesque vitae massa eu tortor euismod tristique vitae eget metus. Integer vel libero
                dignissim, aliquam leo eu, egestas libero.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec justo at augue porta facilisis sit amet
                eu justo. Mauris molestie elit at turpis ullamcorper pretium. Sed lacinia eros id dolor posuere lacinia.
                Nulla in metus enim. Aliquam erat volutpat. Vivamus viverra mi quis quam congue, non rutrum velit
                volutpat. Pellentesque vitae massa eu tortor euismod tristique vitae eget metus. Integer vel libero
                dignissim, aliquam leo eu, egestas libero.</p>
            <a class="btn btn-sm btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
@endsection
