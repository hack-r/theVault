<?php $__env->startSection('main-content'); ?>

  <?php $__env->startComponent('master.notification'); ?>
    <?php $__env->slot('title'); ?>
      Withdraw from balance
    <?php $__env->endSlot(); ?>
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
    <div class="form-group">
      <span>You have total of <span class="font-weight-600"><?php echo e(Auth::user()->balance*0.00000001); ?><span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span></span> available for withdraw</span>
    </div>
    <form class="" action="<?php echo e(route('withdrawpost')); ?>" method="post">
      <div class="form-group">
        <label for="">Withdraw address:</label>
        <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="">How much you want to withdraw:</label>
        <input type="number" name="balance" value="<?php echo e(old('balance')); ?>" class="form-control" step="0.001">
      </div>
      <div class="form-group">
        <label for="">PIN:</label>
        <input type="password" name="pin" value="" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Password:</label>
        <input type="password" name="password" value="" class="form-control">
      </div>
      <div class="form-group">
        <?php echo captcha_img(); ?>

      </div>
      <div class="form-group">
        <input type="text" name="captcha" value="" placeholder="Captcha" class="form-control">
      </div>
      <div class="form-group">
        <center>
          <button type="submit" name="button" class="btn btn-success">Withdraw</button>
          <a href="<?php echo e(route('wallet')); ?>" class="btn btn-primary">Back to My Wallet</a>
        </center>
      </div>
      <?php echo e(csrf_field()); ?>

    </form>
  <?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>