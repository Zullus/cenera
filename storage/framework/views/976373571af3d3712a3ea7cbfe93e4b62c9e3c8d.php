

<?php $__env->startSection('content'); ?>

	<?php foreach($types as $type): ?>
		<?php echo e($type->id); ?> - <?php echo e($type->type); ?>

	<?php endforeach; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>