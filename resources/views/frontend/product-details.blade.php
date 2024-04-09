@extends('frontend.layouts.master')
@section('content')
<div>
    <div class="p-3 main-section bg-white">
       <div class="col-md-10 mx-auto">
       <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                <img src="http://nicesnippets.com/demo/pd-image1.jpg" class="border p-3">
                <span class="sub-img d-flex justify-content-center">
                    <img src="http://nicesnippets.com/demo/pd-image2.jpg" class="border p-2 mx-1">
                    <img src="http://nicesnippets.com/demo/pd-image3.jpg" class="border p-2 mx-1">
                    <img src="http://nicesnippets.com/demo/pd-image4.jpg" class="border p-2 mx-1">
                    <img src="http://nicesnippets.com/demo/pd-image4.jpg" class="border p-2 mx-1">
                </span>
            </div>
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                           
                            <p class="m-0 p-0">Women's Velvet Dress</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">$30</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Detail</h5>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris.</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section"><strong>Tag : </strong><a href="">Woman</a><a href="">,Man</a></p>
                        </div>
                        <div class=" d-flex align-items-center row">
                            <div class="col-md-2"><h6 class="mb-0">Quantity :</h6></div>
                           <div class="col-md-2 p-0"> <input type="number" class="form-control text-center col-md-1 w-100" value="1"></div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-6 pb-2">
                                    <a href="#" class="btn btn-danger w-100">Add To Cart</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-success w-100">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center pt-3">
                <h4>More Product</h4>
            </div>
        </div>
        <div class="row mt-3 p-0 text-center pro-box-section">
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-image1.jpg">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-images2.jpg">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-images3.jpg">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-images4.jpg">
                </div>
            </div>
        </div>
       </div>
    </div>
</div>
@endsection