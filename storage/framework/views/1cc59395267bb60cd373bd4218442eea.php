 
 <?php $__env->startSection('title', 'Strategic Web' . ' - Press'); ?>
 <?php $__env->startSection('content'); ?>

     <div class="container">
         <div class="col-lg-9 mx-auto container">
             <h2 class="fw-semibold pt-4">Latest News</h2>
         </div>
         <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($article->display_priority === 'first'): ?>
                 <div class="container my-4 col-lg-9 mx-auto">
                     <a href="#" style="text-decoration: none;"
                         class="mx-auto row text-dark rounded-4 overflow-hidden p-0 shadow-sm img-hover-effect">
                         <div class="col-md-8 p-0 img-sec">
                             <img src="<?php echo e(asset('images/article' . "/{$article->id}-1.{$article->image}")); ?>"
                                 alt="article-image" class="w-100">
                         </div>
                         <div class="col-md-4 p-4 bg-light shadow-sm">
                             <div style="font-size: 12px;" class="text-secondary mb-3">PRESS RELEASE</div>
                             <h2 class="fw-semibold"><?php echo e($article->title); ?></h2>
                         </div>
                     </a>
                 </div>
             <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <div class="container my-4 col-lg-9 mx-auto p-0">
             <div class="row mx-0">
                 <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($article->display_priority === 'middle'): ?>
                         <div class="col-md-6 mb-4">
                             <div class="rounded-4 overflow-hidden p-0 shadow-sm img-hover-effect">
                                 <a style="text-decoration: none;" href="#" class="shadow-sm text-dark">
                                     <div class="img-sec">
                                         <img src="<?php echo e(asset('images/article' . "/{$article->id}-1.{$article->image}")); ?>"
                                             alt="article-image" class="w-100">
                                     </div>

                                     <div class="content-sec p-4">
                                         <div style="font-size: 12px;" class="text-secondary mb-2 fw-semibold">PHOTOS</div>

                                         <h4 class="fw-semibold"><?php echo e($article->title); ?></h4>

                                         <div style="font-size: 12px;" class="text-secondary mt-5 fw-semibold">
                                             <?php echo e($article->created_at->format('F d, Y')); ?></div>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             </div>

         </div>

         <div class="container my-4 col-lg-9 mx-auto p-0">

             <div class="row mx-0">
                 <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($article->display_priority === 'last'): ?>
                         <div class="col-md-4 mb-4">
                             <div class="rounded-4 overflow-hidden shadow-sm p-0 mr-md-3 img-hover-effect">
                                 <a style="text-decoration: none;" href="#" class="shadow-sm text-dark">
                                     <div class="img-sec">
                                         <img src="<?php echo e(asset('images/article' . "/{$article->id}-1.{$article->image}")); ?>"
                                             alt="article-image" class="w-100">
                                     </div>
                                     <div class="content-sec p-4">
                                         <div style="font-size: 12px;" class="text-secondary mb-2 fw-semibold">Update</div>
                                         <h4 class="fw-semibold"><?php echo e($article->title); ?></h4>
                                         <div style="font-size: 12px;" class="text-secondary mt-5 fw-semibold">
                                             <?php echo e($article->created_at->format('F d, Y')); ?></div>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
         </div>
     </div>

 <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\strategicwebnew\resources\views/frontend/press.blade.php ENDPATH**/ ?>