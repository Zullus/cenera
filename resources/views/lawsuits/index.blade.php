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
	    @foreach($lawsuits as $lawsuit)

	    	<tr>
		      <th scope="row">{{$lawsuit->id}}</th>
		      <td>{{$lawsuit->type}}</td>
		      <td>{{$lawsuit->process_number}}</td>
		      <td>{{$lawsuit->client}}</td>
		      <td>{{$lawsuit->opponent}}</td>
		      <td>{{$lawsuit->responsable}}</td>
		      <td>{{$lawsuit->court}}</td>
		      <td>{{$lawsuit->process}}</td>
		      <td>{{$lawsuit->offense}}</td>
		      <td>{{$lawsuit->attorney}}</td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

	{!!$lawsuits->appends(Request::except('page'))->render()!!}

</body>
</html>