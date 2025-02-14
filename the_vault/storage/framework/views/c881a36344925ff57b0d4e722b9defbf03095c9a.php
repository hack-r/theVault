<?php $__env->startSection('content'); ?>
<table class="table table-hover">
    <thead>
      <th>UniqueID</th>
      <th>Purchase</th>
      <th>Seller</th>
      <th>Buyer</th>
      <th>Value</th>
      <th>Resolved</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php $__currentLoopData = $disputes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($d->uniqueid); ?></td>
          <td><?php echo e($d->purchase->product->name); ?></td>
          <td><?php echo e($d->seller->username); ?></td>
          <td><?php echo e($d->buyer->username); ?></td>
          <td><?php echo e($d->purchase->value*0.00000001); ?></td>
          <td><?php if($d->resolved == false): ?><span class="label label-danger">No</span><?php else: ?> <?php if($d->winner == 1 ): ?> <span class="label label-success">Seller Won</span> <?php else: ?><span class="label label-success">Buyer Won</span> <?php endif; ?> <?php endif; ?></td>
          <td><a href="<?php echo e(route('dispute',['uniqueid'=>$d->uniqueid])); ?>">View</a></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="m-t-25">
<center>
  <?php echo e($disputes->links()); ?>

</center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>