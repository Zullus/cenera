

<?php $__env->startSection('content'); ?>

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Corte</th>
	    </tr>
	  </thead>
	  <tbody>

		<?php foreach($courts as $court): ?>

			<tr>
		      <th scope="row"><?php echo e($court->id); ?></th>
		      <td><?php echo e($court->court); ?></td>
		    </tr>

		<?php endforeach; ?>

	  </tbody>
	</table>

	<?php echo $courts->appends(Request::except('page'))->render(); ?>


	<br>

	<a href="<?php echo route('courts.create'); ?>">
		<button class="btn btn-primary">Añadir nueva Corte</button>
	</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>