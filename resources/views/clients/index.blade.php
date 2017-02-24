@extends('layouts.app')

@section('content')


	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Error!</strong> {{Session::get('success')}}
	</div>
	@endif

	@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Error!</strong> {{Session::get('error')}}
	</div>
	@endif

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Tipo</th>
	      <th>Cliente</th>
	      <th>Contacto</th>
	      <th>Dirección</th>
	      <th>Teléfono(s)</th>
	      <th>E-mail(s)</th>
	      <th>Móvil</th>
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
		      <td>{{$client->adrress}}</td>
		      <td>{{$client->phone}}</td>
		      <td>{{$client->email}}</td>
		      <td>{{$client->mobile}}</td>
		      <td>{{$client->fax}}</td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

	{!!$clients->appends(Request::except('page'))->render()!!}

	<br>

	<a href="{!! route('clients.create') !!}">
		<button class="btn btn-primary">Agregar nueva persona</button>
	</a>

@endsection
