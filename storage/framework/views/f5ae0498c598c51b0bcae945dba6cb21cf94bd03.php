<?php echo $__env->make('backend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('js'); ?><?php /**PATH /Applications/MAMP/htdocs/commersiyaback/resources/views/backend/layouts/default.blade.php ENDPATH**/ ?>