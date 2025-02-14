<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <?php if(session()->has('errormessage')): ?>
    <div class="alert alert-danger">
      <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
    </div>
    <?php endif; ?>
    <?php if(session()->has('successmessage')): ?>
    <div class="alert alert-success">
      <strong>Yay! </strong><span><?php echo e(session()->get('successmessage')); ?></span>
    </div>
    <?php endif; ?>
  </div>
</div>
<div class="row">


<div class="m-t-25">
<center>
  Your current balance is <span class="font-weight-600"><?php echo e(number_format(Auth::user()->balance*0.00000001, 6, '.', ',')); ?> <span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span></span>
</center>
</div>
<div class="m-t-25">
<center>
  <a href="<?php echo e(route('generateaddress')); ?>" class="btn btn-primary">Generate New Deposit Address</a>
  <a href="<?php echo e(route('checkbalance')); ?>" class="btn btn-success">Check Balance</a>
</center>
</div>
<div class="m-t-25">
<center>
  <a href="<?php echo e(route('withdraw')); ?>" class="btn btn-success">Withdraw</a>  
</center>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>