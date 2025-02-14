
<div class="<?php echo e(isset($size) ? $size : 'col-md-6 col-md-offset-3'); ?>">
  <div class="panel panel-default">
    <div class="panel-heading">
      <?php echo e(isset($title) ? $title : 'Notification'); ?>

    </div>
    <div class="panel-body">
        <?php echo e($slot); ?>


    </div>
  </div>
</div>
