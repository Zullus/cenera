@extends('layouts.app')

@section('content')

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
	    @foreach($lawsuits as $lawsuit)

	    	<tr>
		      <th scope="row">{{$lawsuit->id}}</th>
		      <td>{{$lawsuit->types['type']}}</td>
		      <td>{{$lawsuit->process_number}}</td>
		      <td>{{$lawsuit->clients['name']}}</td>
		      <td>{{$lawsuit->opponents['name']}}</td>
		      <td>{{$lawsuit->responsables['name']}}</td>
		      <td>{{$lawsuit->courts['court']}}</td>
		      <td>{{$lawsuit->process}}</td>
		      <td>{{$lawsuit->offense}}</td>
		      <td>{{$lawsuit->attorney}}</td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

	{!!$lawsuits->appends(Request::except('page'))->render()!!}

@endsection