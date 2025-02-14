<?php $__env->startSection('main-content'); ?>

  <?php $__env->startComponent('master.notification'); ?>
    <?php $__env->slot('title'); ?>
      Application for vendor status
    <?php $__env->endSlot(); ?>


          <div class="form-group">
            <span>Your vendor application has been sent successfully. Please be patient until admins review your application.</span>
          </div>
          <div class="form-group">
            <center>
              <a href="<?php echo e(route('profile')); ?>" class="btn btn-primary">Back to profile</a>
            </center>
          </div>

  <?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>