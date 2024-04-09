@extends('frontend.layouts.master')

{{-- @section('title', $settings->site_title . ' - Home') --}}
@section('Strategic Web' . ' - Home')



@section('content')
    <div class="home-hero-sec">
        <!-- Navbar added for the sticky header -->
        @include('frontend.include.header_top')

        {{-- hero section contents here --}}
        @include('frontend.components._home_hero_content')
    </div>


    {{-- services here --}}
    @include('frontend.components._home_services')

    {{-- featured works here --}}
    @include('frontend.components._home_featured_work')

    <div class="container py-5 pt-0">
        <div class="owl-carousel">
            <div class="item">
                <img class="image-1"
                    src="https://png.pngtree.com/thumb_back/fh260/background/20230524/pngtree-three-gold-and-pink-tin-cans-of-the-same-size-set-image_2603886.jpg"
                    alt="Image 1">
                <img class="image-2" src="./img/3.jpg" alt="Image 1">
            </div>

            <div class="item">
                <img class="image-1"
                    src="https://png.pngtree.com/thumb_back/fh260/background/20230521/pngtree-set-of-green-and-orange-trees-on-the-ceiling-image_2668141.jpg"
                    alt="Image 1">
                <img class="image-2" src="./img/3.jpg" alt="Image 1">
            </div>

            <div class="item">
                <img class="image-1" src="./img/5.jpg" alt="Image 1">
                <img class="image-2" src="./img/3.jpg" alt="Image 1">
            </div>
            <div class="item">
                <img class="image-1"
                    src="https://static.vecteezy.com/system/resources/thumbnails/024/173/495/small_2x/a-stunning-image-of-a-minimalist-yellow-showcasing-the-magical-elegance-found-in-simplicity-ai-generative-photo.jpg"
                    alt="Image 1">
                <img class="image-2" src="./img/3.jpg" alt="Image 1">
            </div>

            <div class="item">
                <img class="image-1"
                    src="https://png.pngtree.com/thumb_back/fh260/background/20230521/pngtree-set-of-green-and-orange-trees-on-the-ceiling-image_2668141.jpg"
                    alt="Image 1">
                <img class="image-2" src="./img/3.jpg" alt="Image 1">
            </div>

            <div class="item">
                <img class="image-1" src="./img/5.jpg" alt="Image 1">
                <img class="image-2" src="./img/3.jpg" alt="Image 1">
            </div>
        </div>

    </div>


    <div style="background: #0F0F0F;" class="py-4 mt-4">
        <div class="container">
            <h1 class="my-4 pb-4 border-bottom mt-0 fw-bold text-white">Featured Plans</h1>
            <div class="row overflow-hidden mt-5">
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                                <h6 class="card-title fw-semibold">Web design</h6>
                                <h5 style="color: gray;" class="card-title mb-3">$499.99</h5>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                                <h6 class="card-title fw-semibold">Digital marketing</h6>
                                <h5 style="color: gray;" class="card-title mb-3">$699.99</h5>
                                <div class="row justify-content-center">
                                </div>

                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                                <h6 class="card-title fw-semibold">E-commerce</h6>
                                <h5 style="color: gray;" class="card-title mb-3">$799.99</h5>
                                <div class="row justify-content-center">
                                </div>

                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                                <h6 class="card-title fw-semibold">Graphic design</h6>
                                <h6 class="card-title fw-semibold">(Up to 2 design)</h6>
                                <h5 style="color: gray;" class="card-title mt-3">$15.99</h5>
                            </div>


                            <div class="row justify-content-center">
                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h4 style="color: #F15F50;" class="card-title my-4">Premium Combo Service</h4>
                                <div class="mb-3">
                                    <h6 class="card-title fw-semibold">Web design + Digital marketing (4 month) +
                                        graphic
                                        design (4 month)</h6>
                                    <h5 style="color: gray;" class="card-title mt-3">$1499.99</h5>
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h4 style="color: #F15F50;" class="card-title my-3">Premium Combo Service</h4>
                                <div class="mb-3">
                                    <h6 class="card-title fw-semibold">E-commerce + Digital marketing (4 month) +
                                        graphic
                                        design</h6>
                                    <h5 style="color: gray;" class="card-title mt-3">$1999 .99</h5>
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h4 style="color: #F15F50;" class="card-title my-4">Premium Combo Service</h4>
                                <div class="mb-3">
                                    <h6 class="card-title fw-semibold">Digital marketing + E-commerce</h6>
                                    <h5 style="color: gray;" class="card-title mt-3">$1999 .99</h5>
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div>
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h5 style="color: #F15F50;" class="card-title my-4">Premium Combo Service</h5>

                                <h6 class="card-title fw-semibold ">Graphic design</h6>
                                <h6 class="card-title fw-semibold">(up to 20 design per month)</h6>
                                <div class="mb-3">
                                    <h5 class="card-title mt-3">$89.99</h5>

                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 col-md-4">
                    <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                            <div class="">
                                <img src="./img/sale-tag.png" alt="" class="w-25">
                                <h5 style="color: #F15F50;" class="card-title fw-semibold my-4">Custom
                                </h5>

                                <h6 class="card-text fw-semibold">
                                    Consult us for a free quote
                                </h6>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-outline-dark col-xl-4 col-6" data-bs-toggle="modal"
                                    data-bs-target="#contactModal">Contact Us</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- contact form below --}}
    @include('frontend.components._contact_form')


    {{-- package form below --}}
    @include('frontend.components._package_form')

    <script src="{{ asset('/user_assets') }}/js/home/home.js"></script>

@endsection
