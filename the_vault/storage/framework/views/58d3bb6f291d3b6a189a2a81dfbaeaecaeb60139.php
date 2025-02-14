<?php $__env->startSection('main-content'); ?>
<div class="col-md-6 col-md-offset-3">
  <div class="panel panel-default">
    <div class="panel-heading">
      Verify account
    </div>
    <div class="panel-body">
      <?php if(session()->has('errormessage')): ?>
      <div class="alert alert-danger">
        <strong>Whoops ! </strong><span><?php echo e(session()->get('errormessage')); ?></span>
      </div>
      <?php endif; ?>
     Please enter 16 key mnemonic in order to verify your account
     <form class="" action="<?php echo e(route('verifypost')); ?>" method="post">
         <div class="form-group">
            <label for="password">Mnemonic:</label>
            <textarea name="mnemonic" rows="8" cols="80" class="form-control" style="resize: none"></textarea>
         </div>
         <div class="form-group">
           <center>
             <button type="submit" class="btn btn-primary">Continue to Login</button>

           </center>
         </div>
         <?php echo e(csrf_field()); ?>

     </form>



  </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>