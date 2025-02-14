<?php $__env->startSection('content'); ?>
<div class="margin-top-25 margin-bottom-25">
<center>
  <span>Current feedback score: <?php echo e(Auth::user()->feedbackScore()); ?></span><br>
  <span>Trust rating: <?php echo e(Auth::user()->trustRating()); ?></span>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="progress">
    <div class="progress-bar <?php if(Auth::user()->feedbackScore() < 25 || Auth::user()->trustRating() == 'Unproven'): ?> progress-bar-danger <?php elseif(Auth::user()->feedbackScore() < 50): ?> progress-bar-warning <?php elseif(Auth::user()->feedbackScore() < 70): ?> progress-bar-info <?php else: ?> progress-bar-success <?php endif; ?>" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e(Auth::user()->feedbackScore()); ?>%;">
      <span  <?php if(Auth::user()->feedbackScore() < 25): ?> style="color:#000" <?php endif; ?>><?php echo e(Auth::user()->trustRating()); ?></span>
    </div>
  </div>
  </div>
</div>

</center>
</div>
<table class="table table-hover">
    <thead>
      <td>From</td>
      <th>Type</th>
      <th>My Role</th>
      <th>Comment</th>
      <th>Creation Time</th>

    </thead>
    <tbody>
      <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php if($fd->for == $fd->buyer->id): ?> <?php echo e($fd->seller->username); ?> <?php else: ?> <?php echo e($fd->buyer->username); ?> <?php endif; ?></td>
          <td><?php if($fd->positive == true): ?> <span class="label label-success">Positive</span><?php else: ?> <span class="label label-danger"> Negative</span> <?php endif; ?></td>
          <td><?php if($fd->seller->id == Auth::user()->id): ?> Seller <?php else: ?> Buyer <?php endif; ?></td>
          <td><?php echo e(str_limit($fd->comment, $limit = 40, $end = '...')); ?></td>
          <td><?php echo e($fd->created_at); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="m-t-25">
<center>
<?php echo e($feedback->links()); ?>

</center>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>