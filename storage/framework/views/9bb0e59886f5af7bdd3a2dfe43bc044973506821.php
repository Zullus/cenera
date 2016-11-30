<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courts</title>
</head>
<body>

	<?php foreach($courts as $court): ?>

		<?php echo e($court->id); ?> - <?php echo e($court->court); ?> <br>

	<?php endforeach; ?>

	<?php echo $courts->appends(Request::except('page'))->render(); ?>


</body>
</html>