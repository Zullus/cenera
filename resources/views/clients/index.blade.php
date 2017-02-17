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
	    @foreach($clients as $client)

	    	<tr>
		      <th scope="row">
		      	<a href="{!! route('clients.show', ['id' => $client->id]) !!}">
		      		{{$client->id}}
		      	</a>
		      </th>
		      <td>{{$client->types['type']}}</td>
		      <td>{{$client->lastname}}, {{$client->name}}</td>
		      <td>{{$client->contac}}</td>
		      <td>{{$client->address}}</td>
		      <td>{{$client->phone}}</td>
		      <td>{{$client->email}}</td>
		      <td>{{$client->mobile}}</td>
		      <td>{{$client->fax}}</td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

	{!!$clients->appends(Request::except('page'))->render()!!}

@endsection
