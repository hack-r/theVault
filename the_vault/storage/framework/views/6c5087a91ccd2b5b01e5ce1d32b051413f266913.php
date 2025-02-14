<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><?php echo e(env('APP_NAME')); ?></a>
      <img src="/goldhat.png" alt="GoldHat Free Market" width="50" height="50">
      GoldHat Free Market
    </div>

    <ul class="nav navbar-nav navbar-left">
      <?php if(Auth::check()): ?>
       <li><a href="<?php echo e(route('home')); ?>">Home<span class="sr-only">(current)</span></a></li>
        <?php if(Auth::user()->admin == true): ?>
          <li><a href="<?php echo e(route('admin')); ?>">AP</a></li>
        <?php endif; ?>
        <?php if(Auth::user()->sales()->where('state',0)->count() > 0): ?>
          <li><a href="<?php echo e(route('sales')); ?>"><strong><span class="glyphicon glyphicon-hourglass" aria-hidden='true'></span><?php echo e(Auth::user()->sales()->where('state',0)->count()); ?> Need delivery</strong></a></li>
        <?php endif; ?>
        <?php if(Auth::user()->purchases()->where('state',1)->count() > 0): ?>
          <li style="margin-left:-25px;"><a href="<?php echo e(route('purchases')); ?>"><strong><span class="glyphicon glyphicon-hourglass" aria-hidden='true'></span><?php echo e(Auth::user()->purchases()->where('state',1)->count()); ?> Need confirmation</strong></a></li>
        <?php endif; ?>
       <?php endif; ?>
    </ul>
        <?php if(Auth::check()): ?>
        <ul class="nav navbar-nav navbar-right">
          <?php if(Auth::user()->vendor == true): ?>
           <li><a href="<?php echo e(route('createproduct')); ?>" class="m-r-10"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Product</a></li>
          <?php endif; ?>
            <li><a href="<?php echo e(route('messages')); ?>"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span><?php if(Auth::user()->receivedmessages()->where('viewed',false)->count() > 0): ?> <?php echo e(Auth::user()->receivedmessages()->where('viewed',false)->count()); ?> <?php endif; ?></a></li>
            <li><a href="<?php echo e(route('wallet')); ?>"><span class="glyphicon glyphicon-bitcoin" aria-hidden="true"></span> <?php echo e(number_format(Auth::user()->balance*0.00000001, 6, '.', ',')); ?></a></li>
            <li><a href="<?php echo e(route('profile')); ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
           <li><a href="<?php echo e(route('logout')); ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>

        <?php endif; ?>

  </div><!-- /.container-fluid -->
</nav>
