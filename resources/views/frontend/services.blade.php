 @extends('frontend.layouts.master')
 @section('title', 'Strategic Web' . ' - Services')
 @section('content')

     <div class="service-hero-sec container">
         <div class="col-lg-6">
             <h1 data-aos="fade-up" data-aos-easing="linear" data-aos-anchor-placement="top-bottom" class="custom-heading"> A
                 full-service digital innovation partner</h1>

             <div data-aos="fade-up" data-aos-easing="linear" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
                 class="custom-subtitle">
                 Our rich design and technology expertise delivers top brands and digital experiences.
             </div>
         </div>
     </div>

     {{-- services here --}}
     @include('frontend.components._services')
     </div>
 @endsection
