<?php $__env->startSection('content'); ?>
<table class="table table-hover">
    <thead>
      <th>Name</th>
      <th>Image</th>
      <th>Category</th>
      <th>Sold</th>
      <th>Creation Time</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e(str_limit($product->name, $limit = 25, $end = '...')); ?> <?php if($product->auction == true): ?> <span class="label label-info">Auction</span><?php endif; ?></td>
          <?php if($product->image !== null): ?>
          <td><img class="img-rounded" src="<?php echo e(url($product->image)); ?>" alt="" height="25px" width="25px"></td>
          <?php else: ?>
          <td>No image</td>
          <?php endif; ?>
          <td><?php echo e($product->category->name); ?></td>
          <td><?php if($product->sold == false): ?> <span class="label label-danger">No</span> <?php else: ?> <span class="label label-success">Yes</span><?php endif; ?></td>
          <td><?php echo e($product->created_at); ?></td>
          <td><a href="<?php echo e(route('editproduct',['uniqueid'=>$product->uniqueid])); ?>" class="btn btn-default">Edit</a><?php if($product->auction == false && $product->sold == false): ?><?php if($product->autofilled == false): ?><a href="<?php echo e(route('autofill',['uniqueid'=>$product->uniqueid])); ?>" class="btn btn-default margin-left-5">Add Autofill</a> <?php else: ?> <a href="<?php echo e(route('autofill',['uniqueid'=>$product->uniqueid])); ?>" class="btn btn-default margin-left-5">Edit Autofill</a> <?php endif; ?> <?php endif; ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="m-t-25">
<center>
<?php echo e($products->links()); ?>

</center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>