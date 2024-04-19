 <div style="background: #0F0F0F;" class="py-4 mt-4">
     <div class="container">
         <h1 class="my-4 pb-4 border-bottom mt-0 fw-bold text-white">Featured Plans</h1>
         <div class="row overflow-hidden mt-5">
             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                             <h6 class="card-title fw-semibold">Easy web design (Design + Development +
                                 Tailored Customization)</h6>
                             <h5 style="color: gray;" class="card-title mb-3">$199.99</h5>
                         </div>
                         <div class="row justify-content-center">
                             <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <input type="hidden" name="service_name" value="easy web design">
                                 <input type="hidden" name="total_price" value="199.99">
                                 <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                             <h6 class="card-title fw-semibold">Web design</h6>
                             <h5 style="color: gray;" class="card-title mb-3">$99.99</h5>
                         </div>
                         <div class="row justify-content-center">
                             <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <input type="hidden" name="service_name" value="Web design">
                                 <input type="hidden" name="total_price" value="99.99">
                                 <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                             <h6 class="card-title fw-semibold">Digital marketing</h6>
                             <h5 style="color: gray;" class="card-title mb-3">$499.99</h5>
                             <div class="row justify-content-center">
                                 <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                     <?php echo csrf_field(); ?>
                                     <?php echo method_field('POST'); ?>
                                     <input type="hidden" name="service_name" value="Digital marketing">
                                     <input type="hidden" name="total_price" value="499.99">
                                     <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                             <h6 class="card-title fw-semibold">E-commerce</h6>
                             <h5 style="color: gray;" class="card-title mb-3">$799.99</h5>
                             <div class="row justify-content-center">
                                 <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                     <?php echo csrf_field(); ?>
                                     <?php echo method_field('POST'); ?>
                                     <input type="hidden" name="service_name" value="E commerce">
                                     <input type="hidden" name="total_price" value="799.99">
                                     <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy
                                         Now</button>
                                 </form>
                             </div>


                         </div>
                     </div>
                 </div>
             </div>
             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-4">Basic Service</h4>
                             <h6 class="card-title fw-semibold">Graphic design</h6>
                             <h6 class="card-title fw-semibold">(Up to 2 design)</h6>
                             <h5 style="color: gray;" class="card-title mt-3">$15.99</h5>
                         </div>


                         <div class="row justify-content-center">
                             <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <input type="hidden" name="service_name" value="Graphic design(Up to 2 design)">
                                 <input type="hidden" name="total_price" value="15.99">
                                 <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-4">Premium Combo Service</h4>
                             <div class="mb-3">
                                 <h6 class="card-title fw-semibold">Web design + Digital marketing (4 month) +
                                     graphic
                                     design (4 month)</h6>
                                 <h5 style="color: gray;" class="card-title mt-3">$1499.99</h5>
                             </div>
                         </div>


                         <div class="row justify-content-center">
                             <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <input type="hidden" name="service_name"
                                     value="Web design,Digital marketing(4 month) and Graphic
                                     design(4 month)">
                                 <input type="hidden" name="total_price" value="1499.99">
                                 <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-3">Premium Combo Service</h4>
                             <div class="mb-3">
                                 <h6 class="card-title fw-semibold">E-commerce + Digital marketing (4 month) +
                                     graphic
                                     design</h6>
                                 <h5 style="color: gray;" class="card-title mt-3">$1999.99</h5>
                             </div>
                         </div>


                         <div class="row justify-content-center">
                             <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <input type="hidden" name="service_name"
                                     value="E commerce, Digital marketing(4 month) and Graphic design">
                                 <input type="hidden" name="total_price" value="1999.99">
                                 <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h4 style="color: #F15F50;" class="card-title my-4">Premium Combo Service</h4>
                             <div class="mb-3">
                                 <h6 class="card-title fw-semibold">Digital marketing + E-commerce</h6>
                                 <h5 style="color: gray;" class="card-title mt-3">$1999.99</h5>
                             </div>
                         </div>


                         <div class="row justify-content-center">
                             <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <input type="hidden" name="service_name" value="Digital marketing and E-commerce">
                                 <input type="hidden" name="total_price" value="1999.99">
                                 <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div>
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
                             <h5 style="color: #F15F50;" class="card-title my-4">Premium Combo Service</h5>

                             <h6 class="card-title fw-semibold ">Graphic design</h6>
                             <h6 class="card-title fw-semibold">(up to 20 design per month)</h6>
                             <div class="mb-3">
                                 <h5 class="card-title mt-3">$89.99</h5>

                             </div>
                         </div>

                         <div class="row justify-content-center">
                             <form action="<?php echo e(route('stripe')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <?php echo method_field('POST'); ?>
                                 <input type="hidden" name="service_name"
                                     value="Graphic design(up to 20 design per month)">
                                 <input type="hidden" name="total_price" value="89.99">
                                 <button type="submit" class="btn btn-outline-dark col-xl-4 col-6">Buy Now</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="mb-4 col-md-4">
                 <div class="card block h-100" data-aos="fade-up" data-aos-easing="linear"
                     data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                     <div class="card-body text-center bg-hover-pricing d-flex flex-column justify-content-between">
                         <div class="">
                             <img src="<?php echo e(asset('images/sale-tag.png')); ?>" alt="" class="w-25">
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
<?php /**PATH C:\xampp\htdocs\strategicwebnew\resources\views/frontend/components/_home_featured_plans.blade.php ENDPATH**/ ?>