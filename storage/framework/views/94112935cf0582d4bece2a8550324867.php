<?php if($crud->buttons()->where('stack', $stack)->count()): ?>
	<?php $__currentLoopData = $crud->buttons()->where('stack', $stack); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  <?php echo $button->getHtml($entry ?? null); ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH D:\Dzaky\Kuliah\Semester6\SIRS\SIMRS\vendor\backpack\crud\src\resources\views\crud/inc/button_stack.blade.php ENDPATH**/ ?>