<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courts</title>
</head>
<body>

	@foreach($courts as $court)

		{{$court->id}} - {{$court->court}} <br>

	@endforeach

	{!!$courts->appends(Request::except('page'))->render()!!}

</body>
</html>