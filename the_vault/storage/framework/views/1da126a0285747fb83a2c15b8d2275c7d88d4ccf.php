<?php $__env->startSection('content'); ?>
<div class="col-md-6 col-md-offset-3 m-t-50">
  <?php if(session()->has('errormessage')): ?>
  <div class="alert alert-danger">
    <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
  </div>
  <?php endif; ?>

<form class="" action="<?php echo e(route('createcategorypost')); ?>" method="post">

  <div class="form-group">
    <label for="cname">Category name:</label>
    <input type="text" name="cname" value="" placeholder="Category Name" id="cname" class="form-control">
  </div>
  <div class="form-group">
    <center>
      <button type="submit" name="button" class="btn btn-success">Create Category</button>
    </center>
  </div>
<?php echo e(csrf_field()); ?>

</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>