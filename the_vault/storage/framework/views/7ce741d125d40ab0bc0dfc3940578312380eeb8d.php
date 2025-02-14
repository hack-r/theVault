<?php $__env->startSection('main-content'); ?>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
</ol>
<div class="col-xs-2">
  <?php echo $__env->make('master.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="col-xs-8">
  <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <center>
        <h1><?php echo e($n->title); ?></h1>
        <p><?php echo e($n->text); ?></p>
      </center>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <div class="margin-top-25">
    <center>
      <?php echo e($news->links()); ?>

     <p>  Welcome to GoldHat. </p>

     Usage of this market requires compliance with our <a href="/01_terms_of_service.html">Terms of Service</a>. Please review this document. Make note of the market and admin <a href="/pgp.txt">PGP keys</a>.
    </center>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>