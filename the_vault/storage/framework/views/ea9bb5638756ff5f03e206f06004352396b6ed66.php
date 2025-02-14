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
      <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e(str_limit($sale->product->name, $limit = 25, $end = '...')); ?> <?php if($sale->product->auction == true): ?> <span class="label label-info">Auction</span><?php endif; ?></td>
          <?php if($sale->product->image !== null): ?>
          <td><img class="img-rounded" src="<?php echo e(url($sale->product->image)); ?>" alt="" height="25px" width="25px"></td>
          <?php else: ?>
          <td>No image</td>
          <?php endif; ?>
          <td><?php echo e(number_format($sale->value*0.00000001, 6, '.', ',')); ?></td>
          <td><?php echo e($sale->product->category->name); ?></td>
          <td><?php if($sale->state == 0): ?> <span class="label label-info">Processing</span> <?php elseif($sale->state == 1): ?> <span class="label label-primary">Delivered</span> <?php elseif($sale->state == 2): ?> <span class="label label-success">Completed</span> <?php elseif($sale->state == 3): ?><span class="label label-warning">Disputed</span> <?php elseif($sale->state == 4): ?><span class="label label-danger">Refunded</span> <?php endif; ?></td>
          <td><?php echo e($sale->created_at); ?></td>
          <td><?php if($sale->state == 0): ?><a href="<?php echo e(route('deliver',['uid'=>$sale->uniqueid])); ?>" class="btn btn-success" > Deliver Goods</a> <?php else: ?> <a href="<?php echo e(route('goods',['uid'=>$sale->uniqueid])); ?>" class="btn btn-primary" >Goods</a> <?php endif; ?> <?php if($sale->state == 2 || $sale->state == 4): ?><?php if($sale->feedback()->where('from',Auth::user()->id)->first() == null): ?><a href="<?php echo e(URL::route('newfeedback', array('uniqueid' => $sale->uniqueid,'u'=>'buyer' ))); ?>" class="btn btn-success">Leave Feedback</a> <?php endif; ?> <?php elseif($sale->dispute !== null): ?> <a href="<?php echo e(route('dispute',['uniqueid'=>$sale->dispute->uniqueid])); ?>" class="btn btn-warning">Dispute</a><?php endif; ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="m-t-25">
<center>
<?php echo e($sales->links()); ?>

</center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>