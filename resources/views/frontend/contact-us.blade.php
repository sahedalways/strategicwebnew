@extends('frontend.layouts.master')
@section('title', $settings->site_title . ' - Contact Us')
@section('content')
    <div class="">
        <div class="contact-banner">
            <img src="{{ asset('img/banner-5.jpg') }}" class="d-block w-100" alt="banner-3">
            <h1 class="display-4 custom-position-title">Contact Us</h1>
        </div>
        <div class="container my-5">
            <div class="row">

                <section class="contact-page section-b-space">
                    <div class="container">
                        <div class="row section-b-space">
                            <div class="col-lg-7 map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2883.488502187224!2d-79.28160372494335!3d43.72117784803329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cf00e4a60c77%3A0x7e11951400197ac5!2sHymus%20Sports!5e0!3m2!1sen!2sbd!4v1710184273666!5m2!1sen!2sbd"
                                    width="600" width="600" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="col-lg-5">
                                <div class="contact-right">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <div class="contact-icon">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <p>Contact Us</p>
                                            </div>
                                            <div class="media-body">
                                                <p>00-000-0000</p>

                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <p>Locatlion</p>
                                            </div>
                                            <div class="media-body">
                                                <p>200 calutiani Road <br>
                                                </p>

                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div class="contact-icon">
                                                <i class="fa fa-address-book" aria-hidden="true"></i>
                                                <p>Address</p>
                                            </div>
                                            <div class="media-body">
                                                <p>Toronto, ON M1L 2E1</p>

                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            @include('components.contact-us.contact_us_form')
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
