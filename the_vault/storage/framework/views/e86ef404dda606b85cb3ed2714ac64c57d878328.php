<?php $__env->startSection('main-content'); ?>

  <?php $__env->startComponent('master.notification'); ?>
    <?php $__env->slot('size'); ?>
    col-md-8 col-md-offset-2
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?>
    Send new message
    <?php $__env->endSlot(); ?>
    <?php if(session()->has('errormessage')): ?>
    <div class="alert alert-danger">
      <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
    </div>
    <?php endif; ?>
    <form class="" action="<?php echo e(route('sendmessagepost')); ?>" method="post">
      <div class="form-group">
        <label for="recipient">Recipient:</label>
        <input type="text" name="recipient" id="recipient" value="<?php if($recipient !== null): ?><?php echo e($recipient->username); ?><?php endif; ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="text">Text:</label>
        <textarea name="text" class="form-control" style="resize:none" rows="8" cols="80"><?php echo e(old('text')); ?></textarea>
      </div>
      <div class="form-group">
        <center>
          <button type="submit" name="button" class="btn btn-success">Send Message</button>
        </center>
      </div>
      <?php echo e(csrf_field()); ?>

    </form>

  <?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>