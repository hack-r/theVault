<?php $__env->startSection('main-content'); ?>
<div class="col-md-8 col-md-offset-2">


<div class="panel panel-default">
  <div class="panel-heading">
    Create New Product
  </div>
  <div class="panel-body">
    <?php if(session()->has('errormessage')): ?>
    <div class="alert alert-danger">
      <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
    </div>
    <?php endif; ?>
    <form class="" action="<?php echo e(route('createproductpost')); ?>" method="post" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <label for="name">Product name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="Product Name">
      </div>
      <div class="form-group">
        <label for="price">Price in <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> (starting price if auction)</label>
        <input type="number" step="any" name="price" id="price" class="form-control" value="<?php echo e(old('price')); ?>" placeholder="Price in Bitcoin">
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <select multiple class="form-control" id="category" name="category" >
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option name="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="8" cols="80" class="form-control" id="description" style="resize:none"><?php echo e(old('description')); ?></textarea>
      </div>
      <div class="form-group">
        <label for="refund_policy">Refund Policy: </label>
        <textarea name="refund_policy" rows="8" cols="80" class="form-control" id="refund_policy" style="resize:none"><?php echo e(old('refund_policy')); ?></textarea>
      </div>


      <div class="form-group m-t-25">
        <span>Check this box if you want to sell your product on auction</span><br>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox1" value="true" name="auction"> Auction
        </label>
      </div>
      <div class="form-group">
        <label for="">Auction end date: (needed only if auction box is checked, otherwize ingnore)</label>
        <input type="datetime-local" name="end_date" value="" class="form-control">
      </div>
      <div class="form-group">
        <label for="buyout">Auction buyout price: (needed only if auction box is checked, otherwize ingnore)</label>
        <input type="number" step="any" name="buyout" id="buyout" class="form-control" value="<?php echo e(old('buyout')); ?>" placeholder="Buyout Price in Bitcoin">
      </div>
      <div class="form-group">
        <div class="form-group">
          <label for="exampleInputFile">Product image:</label>
          <input type="file" id="exampleInputFile" name="image">
          <p class="help-block">Maximum image size is 500kb , only images are allowed</p>
        </div>
      </div>

      <div class="form-group m-b-50 m-t-50">
        <center>
          <button type="submit" name="button" class="btn btn-success">Crete Product</button>
        </center>
      </div>


    </form>
  </div>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>