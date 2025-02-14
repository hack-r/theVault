<span class="font-size-20 m-l-10">Categories</span><br>


<div class="list-group">

  <?php if($categories->count() > 0): ?>
  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <a href="<?php echo e(route('showcat',['cslug'=>$category->slug])); ?>" class="list-group-item"><?php echo e($category->name); ?></a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</div>
