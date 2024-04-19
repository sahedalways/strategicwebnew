<?php $__env->startSection('title', 'Strategic Web' . ' - Home'); ?>


<?php $__env->startSection('content'); ?>
    <div class="home-hero-sec">
        
        <?php echo $__env->make('frontend.components._home_hero_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>


    
    <?php echo $__env->make('frontend.components._services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('frontend.components._home_featured_plans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('frontend.components._home_featured_work', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\strategicwebnew\resources\views/frontend/home.blade.php ENDPATH**/ ?>