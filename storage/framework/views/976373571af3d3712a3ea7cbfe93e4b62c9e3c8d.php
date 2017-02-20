

<?php $__env->startSection('content'); ?>

	<table class="table">

		<thead>
			<tr>
				<th>ID</th>
				<th>Tipo</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($types as $type): ?>

				<tr>
					<td><?php echo e($type->id); ?></td>
					<td><?php echo e($type->type); ?></td>
				</tr>

			<?php endforeach; ?>

		</tbody>

	</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>