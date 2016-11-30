<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Persons</title>
</head>
<body>

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Type</th>
	      <th>Client</th>
	      <th>Contact</th>
	      <th>Address</th>
	      <th>Phone(s)</th>
	      <th>E-mail(s)</th>
	      <th>Mobile</th>
	      <th>FAX</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach($persons as $person): ?>

	    	<tr>
		      <th scope="row"><?php echo e($person->id); ?></th>
		      <td><?php echo e($person->type); ?></td>
		      <td><?php echo e($person->lastname); ?>, <?php echo e($person->name); ?></td>
		      <td><?php echo e($person->contac); ?></td>
		      <td><?php echo e($person->address); ?></td>
		      <td><?php echo e($person->phone); ?></td>
		      <td><?php echo e($person->email); ?></td>
		      <td><?php echo e($person->mobile); ?></td>
		      <td><?php echo e($person->fax); ?></td>
		    </tr>

		<?php endforeach; ?>

	  </tbody>
	</table>

	<?php echo $persons->appends(Request::except('page'))->render(); ?>


</body>
</html>
