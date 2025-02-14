<?php $__env->startSection('content'); ?>
<div class="row" style="margin-top:25px;">

  <form class="" action="<?php echo e(route('editsettings')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="col-md-3">
      <div class="form-group">
        <label> Current price for vendor: (in BTC)</label>
        <input type="number" name="vendor_price" value="<?php echo e($settings->vendor_price*0.00000001); ?>" step="any" class="form-control">
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        <label>Current profit from fees: (in BTC)</label>
        <input type="number" name="" value="<?php echo e($settings->collected_fee*0.00000001); ?>" step="any" class="form-control" readonly="">
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        <label>Current fee: (percentage)</label>
        <input type="number" name="fee" value="<?php echo e($settings->fee); ?>" step="any" class="form-control" >
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        <br>
        <button type="submit" name="button" class="btn btn-warning">Edit Settings</button>
      </div>
    </div>

  </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>