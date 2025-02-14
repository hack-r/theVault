<?php $__env->startSection('content'); ?>
<table class="table table-hover">
    <thead>
      <th>UniqueID</th>
      <th>User</th>
      <th>Status</th>
      <th>Date</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php $__currentLoopData = $va; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($v->uniqueid); ?></td>
          <td><?php echo e($v->user->username); ?></td>
          <td><?php if($v->status == 0): ?>Unchecked <?php elseif($v->status == 1): ?>Approved <?php elseif($v->status == 2): ?>Denied <?php elseif($v->status == 3): ?> Paid <?php else: ?> Udefined <?php endif; ?></td>
          <td><?php echo e($v->created_at); ?></td>
          <td><a href="<?php echo e(route('va',['uniqueid'=>$v->uniqueid])); ?>">Edit</a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="m-t-25">
<center>
  <?php echo e($va->links()); ?>

</center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>