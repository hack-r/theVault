<?php $__env->startSection('main-content'); ?>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
  <li><a href="<?php echo e(route('showcat',['cslug'=>$cslug])); ?>"><?php echo e($product->category->name); ?></a></li>
  <li class="active"><?php echo e($product->name); ?></li>
</ol>
<div class="col-md-2">
  <?php echo $__env->make('master.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="col-md-8  m-t-25">

<div class="panel panel-default">
    <div class="panel-heading">
      <?php echo e($product->name); ?>

    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-4">
          <?php if($product->image !== null): ?>
          <img src="<?php echo e(url($product->image)); ?>" alt="" class="img-responsive" height="150px" width="150px"><br>
          <?php else: ?>
          <img src="<?php echo asset('img/No_image_available.svg'); ?>" alt="" class="img-responsive" height="150px" width="150px"><br>
          <?php endif; ?>
        </div>
        <div class="col-md-4">
          <span>Sold by: <?php echo e($product->seller->username); ?></span><br>
          <span>Trust rating: <?php echo e($product->seller->trustRating()); ?></span><br>
          <span>Feedback score:</span><span><?php echo e($product->seller->feedbackScore()); ?></span><br>
          <a href="<?php echo e(route('sendmessage',['username'=>$product->seller->username])); ?>">Send Message to <?php echo e($product->seller->username); ?></a><br>
          <a href="<?php echo e(route('viewprofile',['uniqueid'=>$product->seller->uniqueid])); ?>">View <?php echo e($product->seller->username); ?>'s profile</a>
        </div>
        <div class="col-md-4 ">


          <?php if($product->auction == true): ?>
          <span>Auction is ending on: </span><br>
          <span class="font-weight-600"><?php echo e($product->end_date); ?></span>
          <?php if($a_ends !== null): ?>
          <br><span class="font-size-11"><?php echo e($a_ends); ?> from now</span>
          <?php endif; ?>
          <a href="<?php echo e(route('showbid',['uniqueid'=>$product->uniqueid,'cslug'=>$cslug])); ?>" class="btn btn-default btn-lg btn-block m-t-10">Bid at least <?php if($product->bids->count() > 0): ?><?php echo e(number_format($product->bids->max('value')*0.00000001, 4, '.', ',')); ?> <?php else: ?> <?php echo e(number_format($product->price*0.00000001, 4, '.', ',')); ?> <?php endif; ?><span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span></a>
          <a href="<?php echo e(route('showbuy',['uniqueid'=>$product->uniqueid,'cslug'=>$cslug])); ?>" class="btn btn-primary btn-lg btn-block">Buy now for <?php echo e(number_format($product->buyout*0.00000001, 4, '.', ',')); ?> <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span></a>
          <?php else: ?>
          <a href="<?php echo e(route('showbuy',['uniqueid'=>$product->uniqueid,'cslug'=>$cslug])); ?>" class="btn btn-primary btn-lg btn-block">Buy now for <?php echo e(number_format($product->price*0.00000001, 4, '.', ',')); ?> <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span></a>
          <?php endif; ?>
          <div class="m-t-5">
            <center>
                <span class="font-size-12">You are protected by <span class="font-weight-600">escrow</span> <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></span>
            </center>
          </div>

        </div>
      </div>
  <div class="row margin-top-25 ">
    <ul class="nav nav-tabs">
    <li role="presentation" <?php if($item == 'description'): ?>class="active"<?php endif; ?>><a href="<?php echo e(route('viewproduct',['cslug'=>$cslug,'uniqueid'=>$product->uniqueid])); ?>">Product Description</a></li>
    <li role="presentation" <?php if($item == 'refund_policy'): ?>class="active"<?php endif; ?>><a href="<?php echo e(route('viewproduct',['cslug'=>$cslug,'uniqueid'=>$product->uniqueid,'item'=>'refund_policy'])); ?>">Refund Policy</a></li>
    <li role="presentation" <?php if($item == 'feedback'): ?>class="active"<?php endif; ?>><a href="<?php echo e(route('viewproduct',['cslug'=>$cslug,'uniqueid'=>$product->uniqueid,'item'=>'feedback'])); ?>">Seller's Feedback</a></li>
    </ul>
  </div>
    <div class="margin-top-25">
    <?php if($item == 'description'): ?>
    <span><?php echo e($product->description); ?></span>

    <?php elseif($item == 'refund_policy'): ?>
    <span><?php if($product->refund_policy == null): ?>No refund policy <?php else: ?> <?php echo e($product->refund_policy); ?> <?php endif; ?></span>

    <?php elseif($item == 'feedback'): ?>
    <div class="margin-top-25 margin-bottom-15">
    <center>
      <span>Current feedback score: <?php echo e($product->seller->feedbackScore()); ?></span><br>
      <span>Trust rating: <?php echo e($product->seller->trustRating()); ?></span>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="progress">
        <div class="progress-bar <?php if($product->seller->feedbackScore() < 25 || $product->seller->trustRating() == 'Unproven'): ?> progress-bar-danger <?php elseif($product->seller->feedbackScore() < 50): ?> progress-bar-warning <?php elseif($product->seller->feedbackScore() < 70): ?> progress-bar-info <?php else: ?> progress-bar-success <?php endif; ?>" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($product->seller->feedbackScore()); ?>%;">
          <span  <?php if($product->seller->feedbackScore() < 25): ?> style="color:#000" <?php endif; ?>><?php echo e($product->seller->trustRating()); ?></span>
        </div>
      </div>
      </div>
    </div>
    <span>Feedback from buyers:</span><br>
    <table class="table table-hover">
      <thead>
        <th>From</th>
        <th>Type</th>
        <th>Comment</th>
        <th>Time</th>
      </thead>

      <tbody>
    <?php $__currentLoopData = $product->seller->feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($fd->for == $fd->seller_id && $fd->active == true): ?>
      <tr>
        <td><?php echo e($fd->buyer->username); ?></td>
        <td><?php if($fd->positive == true): ?> <span class="label label-success">Positive</span><?php else: ?> <span class="label label-danger"> Negative</span> <?php endif; ?></td>
        <td><?php echo e(str_limit($fd->comment, $limit = 40, $end = '...')); ?></td>
        <td><?php echo e($fd->created_at); ?></td>
      </tr>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </center>
    </div>
    <?php endif; ?>
    </div>
    </div>
    <!-- end of panel body -->
</div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>