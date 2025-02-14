<?php $__env->startSection('content'); ?>
<div class="col-md-6 col-md-offset-3 m-t-50">
  <?php if(session()->has('errormessage')): ?>
  <div class="alert alert-danger">
    <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
  </div>
  <?php endif; ?>

<form class="" action="<?php echo e(route('editcategorypost',['uniqueid'=>$category->uniqueid])); ?>" method="post">
<div class="form-group">
<label for="cname">Category Name</label>
<input type="text" id="cname"name="cname" value="<?php echo e($category->name); ?>" class="form-control">
</div>
<div class="form-group">
<label for="cslug">Category Slug</label>
<input type="text" id="cslug"name="cslug" value="<?php echo e($category->slug); ?>" class="form-control">
</div>
<div class="form-group">
<center>
  <button type="submit" name="button" class="btn btn-warning">Edit Category</button>
</center>
</div>

<?php echo e(csrf_field()); ?>

</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>