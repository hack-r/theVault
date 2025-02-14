<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo e(env('APP_TITLE')); ?></title>
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap3.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/helpers.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>">
  </head>
  <body>
    <?php if(env('APP_DEMO') == true): ?>
    <?php echo $__env->make('master.demobar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('master.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
    <?php echo $__env->yieldContent('main-content'); ?>
    </div>
  </body>
</html>
