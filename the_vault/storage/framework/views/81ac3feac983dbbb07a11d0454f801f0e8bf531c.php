<?php $__env->startSection('main-content'); ?>

  <?php $__env->startComponent('master.notification'); ?>
    <?php $__env->slot('size'); ?>
    col-md-8 col-md-offset-2
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?>
    My messages
    <?php $__env->endSlot(); ?>
    <div class="row">
      <center>
        <a href="<?php echo e(route('sendmessage')); ?>" class="btn btn-primary">Send new message</a>
      </center>
    </div>
    <div class="row">
      <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="<?php echo e(route('messages')); ?>">Received</a></li>
      <li role="presentation"><a href="<?php echo e(route('messagessent')); ?>">Sent</a></li>
      </ul>
    </div>
    <table  class="table table-hover">
      <thead>
        <th>From</th>
        <th>Title</th>
        <th>Time</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php $__currentLoopData = $received; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($r->From->username); ?> <?php if($r->viewed == false): ?><span class="label label-default">Not Viewed</span> <?php endif; ?></td>
            <td><?php echo e(str_limit($r->title, $limit = 20, $end = '...')); ?></td>
            <td><?php echo e($r->created_at); ?></td>
            <td><a href="<?php echo e(route('viewmessage',['uniqueid'=>$r->uniqueid])); ?>" class="btn btn-default">Open</a></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <div class="form-group">
      <center>
        <?php echo e($received->links()); ?>

      </center>
    </div>

  <?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>