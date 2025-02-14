<?php $__env->startSection('main-content'); ?>

  <?php $__env->startComponent('master.notification'); ?>
    <?php $__env->slot('title'); ?>
      Autofill for <span class="font-weight-600"><?php echo e($product->name); ?></span>
    <?php $__env->endSlot(); ?>

        <?php if(session()->has('errormessage')): ?>
        <div class="alert alert-danger">
          <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
        </div>
        <?php endif; ?>
        <?php if(session()->has('successmessage')): ?>
        <div class="alert alert-success">
          <strong>Whoops ! </strong><span><?php echo e(session()->get('successmessage')); ?></span>
        </div>
        <?php endif; ?>
          <div class="form-group">
            <span>Each line represents single item that will be sent to user when he purchase product. You can add maximum of 150 items</span>
          </div>
            <form class="" action="<?php echo e(route('autofillpost',['uniqueid'=>$product->uniqueid])); ?>" method="post">
          <div class="form-group">
            <textarea name="autofill" rows="15" cols="150" style="resize:none" class="form-control"><?php if($autofill !== null): ?><?php $__currentLoopData = $autofill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($line."\r"); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?></textarea>
          </div>



          <div class="form-group">
            <center>
              <?php if($product->autofill !== null): ?>
              <button type="submit" name="button" class="btn btn-warning">Edit Autofill</button>
              <?php else: ?>
              <button type="submit" name="button" class="btn btn-success">Add Autofill</button>
              <?php endif; ?>
              <a href="<?php echo e(route('products')); ?>" class="btn btn-danger">Back to products</a>
            </center>
          </div>

          <?php echo e(csrf_field()); ?>

                    </form>
  <?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>