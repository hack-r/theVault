<ul class="nav nav-tabs">
  <li role="presentation" <?php if(Route::currentRouteName() == 'profile'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('profile')); ?>">General Info</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'products'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('products')); ?>">My Products</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'sales'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('sales')); ?>">My Sales</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'purchases'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('purchases')); ?>">My Purchases</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'feedback'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('feedback')); ?>">My Feedback</a></li>
    <li role="presentation" <?php if(Route::currentRouteName() == 'wallet'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('wallet')); ?>">My Wallet</a></li>
</ul>
