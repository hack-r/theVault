<?php $__env->startSection('content'); ?>
<div class="form-group margin-top-25">
  <center>
    <a href="<?php echo e(route('newscreate')); ?>" class="btn btn-primary">Create New</a>
  </center>
</div>
<table class="table table-hover">
    <thead>
      <th>UniqueID</th>
      <th>Title</th>
      <th>Published At</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($n->uniqueid); ?></td>
          <td><?php echo e(str_limit($n->title, $limit = 30, $end = '...')); ?></td>
          <td><?php echo e($n->created_at); ?></td>
          <td><a href="<?php echo e(route('editnews',['uniqueid'=>$n->uniqueid])); ?>" class="btn btn-default">Edit</a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="m-t-25">
<center>
  <?php echo e($news->links()); ?>

</center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>