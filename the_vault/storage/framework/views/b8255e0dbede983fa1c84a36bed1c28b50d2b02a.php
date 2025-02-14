<?php $__env->startSection('content'); ?>
<table class="table table-hover">
    <thead>
      <th>Name</th>
      <th>Image</th>
      <th>Value</th>
      <th>Category</th>
      <th>State</th>
      <th>Purchase Time</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e(str_limit($purchase->product->name, $limit = 25, $end = '...')); ?> <?php if($purchase->product->auction == true): ?> <span class="label label-info">Auction</span><?php endif; ?></td>
          <?php if($purchase->product->image !== null): ?>
          <td><img class="img-rounded" src="<?php echo e(url($purchase->product->image)); ?>" alt="" height="25px" width="25px"></td>
          <?php else: ?>
          <td>No image</td>
          <?php endif; ?>
          <td><?php echo e(number_format($purchase->value*0.00000001, 6, '.', ',')); ?></td>
          <td><?php echo e($purchase->product->category->name); ?></td>
          <td><?php if($purchase->state == 0): ?> <span class="label label-info">Processing</span> <?php elseif($purchase->state == 1): ?> <span class="label label-primary">Delivered</span> <?php elseif($purchase->state == 2): ?> <span class="label label-success">Completed</span> <?php elseif($purchase->state == 3): ?><span class="label label-warning">Disputed</span> <?php elseif($purchase->state == 4): ?><span class="label label-success">Refunded</span> <?php endif; ?></td>
          <td><?php echo e($purchase->created_at); ?></td>
          <td><a href="<?php if($purchase->state !== 0): ?><?php echo e(route('goods',['uid'=>$purchase->uniqueid])); ?><?php endif; ?>" class="btn btn-primary"  <?php if($purchase->state == 0): ?> disabled <?php endif; ?>>Goods</a> <?php if($purchase->state == 2 || $purchase->state == 4): ?><?php if($purchase->feedback == null): ?><a href="<?php echo e(URL::route('newfeedback', array('uniqueid' => $purchase->uniqueid,'u'=>'seller' ))); ?>" class="btn btn-success">Leave Feedback</a> <?php endif; ?> <?php elseif($purchase->dispute !== null): ?> <a href="<?php echo e(route('dispute',['uniqueid'=>$purchase->dispute->uniqueid])); ?>" class="btn btn-warning">Dispute</a> <?php endif; ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="m-t-25">
<center>
<?php echo e($purchases->links()); ?>

</center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>