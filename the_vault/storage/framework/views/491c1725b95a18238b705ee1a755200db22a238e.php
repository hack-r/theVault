<style media="screen">
.product{
  color:#333;
}
  .product:hover{
    color:#333;
  }
</style>
<?php $__env->startSection('main-content'); ?>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
  <li><a href="<?php echo e(route('showcat',['cslug'=>$cslug])); ?>"><?php echo e($category->name); ?></a></li>
</ol>
<div class="col-md-2">
  <?php echo $__env->make('master.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="col-md-10 m-t-25">
<div class="list-group">
  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <a href="<?php echo e(route('viewproduct',['cslug'=>$cslug,'uniqueid'=>$product->uniqueid])); ?>" class="product">
  <div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-2 pull-left ">
          <?php if($product->image !== null): ?>
          <img src="<?php echo e(url($product->image)); ?>" alt="" height="100px" width="100px">
          <?php else: ?>
          <img src="<?php echo asset('img/No_image_available.svg'); ?>" alt="" height="100px" width="100px">
          <?php endif; ?>
      </div>
      <div class="m-l-50 col-md-7 ">
          <span class="font-size-24 " style="vertical-align:top"><?php echo e($product->name); ?></span><br>
          <span>Sold by: <?php echo e($product->seller->username); ?></span><br>
          <span><?php echo e(str_limit($product->description, $limit = 120, $end = '...')); ?></span><br>
          <?php if($product->auction == true): ?>
          <span class="font-size-12"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span>Aucion ends: <?php echo e($product->end_date); ?></span>
          <?php endif; ?>

      </div>
      <div class="col-md-3 pull-right " >
        <center>
          <?php if($product->auction == true): ?>
          <a href="<?php echo e(route('viewproduct',['cslug'=>$cslug,'uniqueid'=>$product->uniqueid])); ?>" class="btn btn-primary" role="button" >Buy now for <?php echo e(number_format($product->buyout*0.00000001, 2, '.', ',')); ?> <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span></a>
         <br><a href="<?php echo e(route('viewproduct',['cslug'=>$cslug,'uniqueid'=>$product->uniqueid])); ?>" class="btn btn-default m-t-10" role="button">Bid</a><br><br>
         <span><?php echo e($product->bids->count()); ?> bids currently</span>

          <?php else: ?>
          <a href="<?php echo e(route('viewproduct',['cslug'=>$cslug,'uniqueid'=>$product->uniqueid])); ?>" class="btn btn-primary" role="button" >Buy for <?php echo e($product->price*0.00000001); ?> <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span></a>
          <?php endif; ?>
       </center>
      </div>

    </div>
  </div>
  </a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- REF -->

</div>
<div class="row">
  <center>
    <?php echo e($products->links()); ?>

  </center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>