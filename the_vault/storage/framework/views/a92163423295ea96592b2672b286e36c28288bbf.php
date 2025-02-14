<?php $__env->startSection('content'); ?>
<div class="m-t-25 m-b-20">
<center>
  <a href="<?php echo e(route('createcategory')); ?>" class="btn btn-primary">Create category</a>
</center>
</div>
<table class="table table-hover">
    <thead>
      <th>UniqueID</th>
      <th>Name</th>
      <th>Slug</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($category->uniqueid); ?></td>
          <td><?php echo e($category->name); ?></td>
          <td><?php echo e($category->slug); ?></td>
          <td><a href="<?php echo e(route('editcategory',['uniqueid'=>$category->uniqueid])); ?>">Edit</a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>