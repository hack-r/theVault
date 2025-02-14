<?php $__env->startSection('content'); ?>
<div class="col-md-8 col-md-offset-2">
  <?php if(session()->has('errormessage')): ?>
  <div class="alert alert-danger">
    <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
  </div>
  <?php endif; ?>
<form class="" action="<?php echo e(route('editproductpost',['uniqueid'=>$product->uniqueid])); ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Product name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?php echo e($product->name); ?>" placeholder="Product Name" <?php if($product->sold == true): ?> disabled <?php endif; ?>>
  </div>
  <div class="form-group">
    <label for="price">Price in <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> (starting price if auction)</label>
    <input type="number"  step="any" name="price" id="price" class="form-control" value="<?php echo e($product->price*0.00000001); ?>" placeholder="Product price" <?php if($product->sold == true || $product->auction == true): ?> disabled <?php endif; ?>>
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <input type="text" name="" value="<?php echo e($product->category->name); ?>" class="form-control" readonly="">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" rows="8" cols="80" class="form-control" id="description" style="resize:none" <?php if($product->sold == true): ?> disabled <?php endif; ?>><?php echo e($product->description); ?></textarea>
  </div>
  <div class="form-group">
    <label for="refund_policy">Refund Policy: </label>
    <textarea name="refund_policy" rows="8" cols="80" class="form-control" id="refund_policy" style="resize:none" readonly=""><?php echo e($product->refund_policy); ?></textarea>
  </div>
  <?php if($product->image !== null): ?>
  <div class="form-group">
    <label for="currentimg">Current image:</label><br>
    <img src="<?php echo e(url($product->image)); ?>" alt="" width="150px" height="150px">
  </div>
  <?php endif; ?>

  <div class="form-group">
    <label for="exampleInputFile">Change image:</label>
    <input type="file" id="exampleInputFile" name="image" <?php if($product->sold == true): ?> disabled <?php endif; ?>>
    <p class="help-block">Maximum image size is 500kb , only images are allowed</p>
  </div>

  <?php if($product->auction == true): ?>
  <div class="form-group">
    <span>Auction is ending on <?php echo e($product->end_date); ?></span>
  </div>
  <div class="form-group">
    <label for="buyout">Auction buyout price: </label>
    <input type="number" step="any" name="buyout" id="buyout" class="form-control" value="<?php echo e($product->buyout*0.00000001); ?>" placeholder="Buyout Price in Bitcoin" <?php if($product->sold == true): ?> disabled <?php endif; ?>>
  </div>
  <?php endif; ?>
 <div class="form-group m-t-25">
   <center>
     <button type="submit" name="button" class="btn btn-warning">Edit Product</button>
   </center>
 </div>
 <?php echo e(csrf_field()); ?>

</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>