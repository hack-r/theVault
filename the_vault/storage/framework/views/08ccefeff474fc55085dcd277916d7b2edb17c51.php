<ul class="nav nav-tabs">
  <li role="presentation" <?php if(Route::currentRouteName() == 'admin'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('admin')); ?>">Home</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'categories'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('categories')); ?>">Categories</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'vendorapplications'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('vendorapplications')); ?>">Vendor Applications</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'disputes'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('disputes')); ?>">Disputes</a></li>
  <li role="presentation" <?php if(Route::currentRouteName() == 'news'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('news')); ?>">News</a></li>
</ul>
