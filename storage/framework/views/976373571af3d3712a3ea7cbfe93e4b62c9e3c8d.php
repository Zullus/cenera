<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Types</title>
</head>
<body>
	<?php foreach($types as $type): ?>
		<?php echo e($type->id); ?> - <?php echo e($type->type); ?>

	<?php endforeach; ?>
</body>
</html>