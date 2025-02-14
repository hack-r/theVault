<?php $__env->startSection('content'); ?>
<div class="form-group col-md-6">
  <label for="uniqueid">UniqueID</label>
  <input type="text"  value="<?php echo e($user->uniqueid); ?>" readonly="" id="uniqueid" class="form-control">
</div>
<div class="form-group col-md-6">
  <label for="regdate">Registration date:</label>
  <input type="text"  value="<?php echo e($user->created_at); ?>" readonly="" id="regdate" class="form-control">
</div>

<?php if($user->vendor == false): ?>
    <div class="form-group margin-top-50">
      <label for="">Vendor:</label> <span class="label label-danger">No</span><br>
      <span>You are currently not vendor. In order to become one pay <?php echo e($settings->vendor_price*0.00000001); ?> <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> and get upgraded straight away, or send application for a chance to avoid payment </span><br>
      <div class="m-t-15">
          <a href="<?php echo e(route('vendorpay')); ?>" class="btn btn-success">Pay now</a><?php if($user->application->first() == null): ?><a href="<?php echo e(route('vendorapply')); ?>" class="btn btn-primary m-l-10">Apply for vendor status</a><?php else: ?> <?php if($user->application->first()->status == 2): ?> Your application for vendor status has been denied <?php else: ?> You have already applied for vendor status <?php endif; ?> <?php endif; ?>
      </div>
    </div>
<?php else: ?>
<div class="form-group margin-top-50">
  <label for="">Vendor:</label> <span class="label label-success">Yes</span><br>
</div>
<?php endif; ?>

<div class="col-md-8 col-md-offset-2">
<form class="" action="<?php echo e(route('editprofile')); ?>" method="post">
  <div class="form-group margin-top-25">
  <label for="pd">Profile Description:</label>
  <textarea name="pd" rows="8" cols="80" id="pd" class="form-control" style="resize:none"><?php echo e(Auth::user()->profile); ?></textarea>
  </div>

  <div class="form-group margin-top-25">
  <label for="pgp">PGP Key:</label>
  <textarea name="pgp" rows="8" cols="80" id="pgp" class="form-control" style="resize:none"><?php echo e(Auth::user()->pgp); ?></textarea>
  </div>
  <div class="form-group">
    <center>
      <button type="submit" name="button" class="btn btn-warning">Edit</button>
    </center>
  </div>
<?php echo e(csrf_field()); ?>

</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>