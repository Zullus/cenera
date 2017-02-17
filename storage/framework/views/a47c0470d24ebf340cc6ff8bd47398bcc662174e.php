

<?php $__env->startSection('content'); ?>

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Type</th>
	      <th>Process Number</th>
	      <th>Client</th>
	      <th>Opponent</th>
	      <th>Responsable</th>
	      <th>Court</th>
	      <th>Process</th>
	      <th>Offense</th>
	      <th>Attorney</th>
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
		      <td><?php echo e($lawsuit->offense); ?></td>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>