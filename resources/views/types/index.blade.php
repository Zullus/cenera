<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Types</title>
</head>
<body>
	@foreach($types as $type)
		{{$type->id}} - {{$type->type}}
	@endforeach
</body>
</html>