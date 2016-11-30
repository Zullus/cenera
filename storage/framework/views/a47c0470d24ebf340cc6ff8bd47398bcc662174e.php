<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lawsuits</title>
</head>
<body>

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
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach($lawsuits as $lawsuit): ?>

	    	<tr>
		      <th scope="row"><?php echo e($lawsuit->id); ?></th>
		      <td><?php echo e($lawsuit->type); ?></td>
		      <td><?php echo e($lawsuit->process_number); ?></td>
		      <td><?php echo e($lawsuit->client); ?></td>
		      <td><?php echo e($lawsuit->opponent); ?></td>
		      <td><?php echo e($lawsuit->responsable); ?></td>
		      <td><?php echo e($lawsuit->court); ?></td>
		      <td><?php echo e($lawsuit->process); ?></td>
		      <td><?php echo e($lawsuit->offense); ?></td>
		      <td><?php echo e($lawsuit->attorney); ?></td>
		    </tr>

		<?php endforeach; ?>

	  </tbody>
	</table>

	<?php echo $lawsuits->appends(Request::except('page'))->render(); ?>


</body>
</html>