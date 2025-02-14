<?php $__env->startSection('content'); ?>
<div class="col-xs-8 col-xs-offset-2 m-t-50">
  <div class="form-group">
    Application by <?php echo e($va->user->username); ?> sent <?php echo e($va->created_at); ?>

  </div>
  <div class="form-group">
    <textarea name="name" rows="8" cols="80" class="form-control" readonly="" style="resize:none"><?php echo e($va->offer); ?></textarea>
  </div>
  <div class="form-group">
    <textarea name="name" rows="8" cols="80" class="form-control" readonly="" style="resize:none"><?php echo e($va->void); ?></textarea>
  </div>
  <div class="form-group">
    <textarea name="name" rows="8" cols="80" class="form-control" readonly="" style="resize:none"><?php echo e($va->other_markets); ?></textarea>
  </div>
  <form class="" action="<?php echo e(route('vapost',['uniqueid'=>$va->uniqueid])); ?>" method="post">
  <div class="form-group m-t-25">
  <?php if($va->status == 0): ?>
  <center>
  <button type="submit" name="action" value="approve"class="btn btn-success">Approve</button>
  <button type="submit" name="action" value="decline" class="btn btn-danger m-l-10">Decline</button>
  </center>
  <?php elseif($va->status == 1): ?>
  <center>
      <span>This application is approved</span>
  </center>
  <?php elseif($va->status == 2): ?>
  <center>
      <span>This application is declined</span>
  </center>
  <?php elseif($va->status == 3): ?>
  <center>
      <span>User paid in order to get vendor status</span>
  </center>
  <?php endif; ?>
  <br>
  <a href="<?php echo e(route('vendorapplications')); ?>" class="btn btn-primary m-t-25">Back to the list of applications</a>
  </div>
  <?php echo e(csrf_field()); ?>

  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>