

<?php $__env->startSection('content'); ?>

	<?php if(Session::has('error')): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Error!</strong> <?php echo e(Session::get('error')); ?>

	</div>
	<?php endif; ?>

	<?php if($busca != ''): ?>
	<p>
		<strong>
			Búsca por: <?php echo e($busca); ?>

		</strong>
	</p>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<?php echo Form::open(['url' => route('lawsuits.search'), 'class' => 'category-form']); ?>

				<?php echo Form::text('search', $busca, ['class' => 'form-control col-md-4 select2', 'placeholder' => 'Haz tu búsqueda por nombre']); ?>


				<button class="btn btn-primary">Buscar</button>

			<?php echo Form::close(); ?>

		</div>
	</div>

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Tipo</th>
	      <th>Proceso</th>
	      <th>Número de proceso</th>
	      <th>Cliente</th>
	      <th>Procurador</th>
	      <th>Corte</th>
	      <th>Ofensa</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach($lawsuits as $lawsuit): ?>

	    	<tr>
		      <th scope="row">
		      	<a href="<?php echo route('lawsuits.show', ['id' => $lawsuit->id]); ?>">
		      		<?php echo e($lawsuit->id); ?>

		      	</a>
		      </th>
		      <td>
		      	<?php if(isset($lawsuit->types['type'])): ?>
		      		<?php echo e($lawsuit->types['type']); ?>

		      	<?php else: ?>
					<?php echo e($lawsuit->typename); ?>

				<?php endif; ?>
		      </td>
		      <td><?php echo e($lawsuit->process); ?></td>
		      <td><?php echo e($lawsuit->process_number); ?></td>
		      <td>
		      	<a href="<?php echo route('clients.show', ['id' => $lawsuit->client]); ?>">
		      		<?php if(isset($lawsuit->clients['name'])): ?>
			      		<?php echo e($lawsuit->clients['name']); ?>

			      	<?php else: ?>
			      		<?php if($lawsuit->lastname != ''): ?>
			      			<?php echo e($lawsuit->lastname); ?>, 
			      		<?php endif; ?>

						<?php echo e($lawsuit->name); ?>

					<?php endif; ?>
		      	</a>
		      </td>
			  <td>
		      	<a href="<?php echo route('clients.show', ['id' => $lawsuit->attorney]); ?>">
		      		<?php if(isset($lawsuit->attorneys['name'])): ?>
			      		<?php echo e($lawsuit->attorneys['name']); ?>

			      	<?php else: ?>
			      		<?php if($lawsuit->attorneylastname != ''): ?>
			      			<?php echo e($lawsuit->attorneylastname); ?>, 
			      		<?php endif; ?>

						<?php echo e($lawsuit->attorneyname); ?>

					<?php endif; ?>
		      	</a>
		      </td>
		      <td>
		      	<a href="<?php echo route('courts.show', ['id' => $lawsuit->court]); ?>">
		      		<?php if(isset($lawsuit->courts['name'])): ?>
			      		<?php echo e($lawsuit->courts['name']); ?>

			      	<?php else: ?>
						<?php echo e($lawsuit->courtname); ?>

					<?php endif; ?>
		      	</a>
		      </td>
		      <td><?php echo e(substr($lawsuit->offense, 0, 50)); ?>...</td>
		    </tr>

		<?php endforeach; ?>

	  </tbody>
	</table>

	<?php echo $lawsuits->appends(Request::except('page'))->render(); ?>


	<br>

	<a href="<?php echo route('lawsuits.create'); ?>">
		<button class="btn btn-primary">Añadir nuevo Pleitos</button>
	</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>