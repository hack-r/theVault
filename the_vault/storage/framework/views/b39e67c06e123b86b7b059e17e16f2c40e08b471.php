<?php $__env->startSection('main-content'); ?>
<div class="col-md-12">
<?php echo $__env->make('admin.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>