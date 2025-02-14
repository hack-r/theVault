<?php $__env->startSection('main-content'); ?>
<div class="col-md-12 ">


<div class="panel panel-default">
  <div class="panel-heading">
    <a href="<?php echo e(route('viewprofile',['uniqueid'=>Auth::user()->uniqueid])); ?>"><?php echo e(Auth::user()->username); ?></a>
  </div>
  <div class="panel-body">
    <div class="m-t-15 m-b-50">
    <?php echo $__env->make('profile.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
  </div>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>