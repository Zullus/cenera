@extends('layouts.app')

@section('content')

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
	    @foreach($persons as $person)

	    	<tr>
		      <th scope="row">{{$person->id}}</th>
		      <td>{{$person->type}}</td>
		      <td>{{$person->lastname}}, {{$person->name}}</td>
		      <td>{{$person->contac}}</td>
		      <td>{{$person->address}}</td>
		      <td>{{$person->phone}}</td>
		      <td>{{$person->email}}</td>
		      <td>{{$person->mobile}}</td>
		      <td>{{$person->fax}}</td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

	{!!$persons->appends(Request::except('page'))->render()!!}

@endsection
