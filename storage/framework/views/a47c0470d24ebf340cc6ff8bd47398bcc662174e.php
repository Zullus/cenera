

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

				<?php echo Form::text('search', $busca, ['class' => 'form-control col-md-4 select2', 'placeholder' => 'Haz tu búsqueda por número de proceso']); ?>


				<button class="btn btn-primary">Buscar</button>

			<?php echo Form::close(); ?>

		</div>
	</div>

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Tipo</th>
	      <th>Número de proceso</th>
	      <th>Cliente</th>
	      <th>Adversario</th>
	      <th>Responsable</th>
	      <th>Corte</th>
	      <th>Proceso</th>
	      <th>Ofensa</th>
	      <th>Abogado</th>
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
		      <td><?php echo e($lawsuit->types['type']); ?></td>
		      <td><?php echo e($lawsuit->process_number); ?></td>
		      <td>
		      	<a href="<?php echo route('clients.show', ['id' => $lawsuit->client]); ?>">
		      		<?php echo e($lawsuit->clients['name']); ?>

		      	</a>
		      </td>
		      <td>
		      	<a href="<?php echo route('clients.show', ['id' => $lawsuit->opponent]); ?>">
		      		<?php echo e($lawsuit->opponents['name']); ?>

		        </a>
		  	  </td>
		      <td>
		      	<a href="<?php echo route('clients.show', ['id' => $lawsuit->responsable]); ?>">
		      		<?php echo e($lawsuit->responsables['name']); ?>

		      	</a>
		      </td>
		      <td>
		      	<a href="<?php echo route('courts.show', ['id' => $lawsuit->court]); ?>">
		      		<?php echo e($lawsuit->courts['court']); ?>

		      	</a>
		      </td>
		      <td><?php echo e($lawsuit->process); ?></td>
		      <td><?php echo e(substr($lawsuit->offense, 0, 50)); ?>...</td>
		      <td>
		      	<a href="<?php echo route('clients.show', ['id' => $lawsuit->attorney]); ?>">
		      		<?php echo e($lawsuit->attorneys['name']); ?>

		      	</a>
		      </td>
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