@extends('layouts.app')

@section('content')

	<h2>Data form person {{$client->name}} {{$client->lastname}}</h2>

	<table class="table">
		<thead>
			<tr>
				<td><strong>Fields</strong></td>
				<td><strong>Values</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>id</td>
				<td>{{$client->id}}</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>{{$client->name}}</td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>{{$client->lastname}}</td>
			</tr>
			<tr>
				<td>Contact</td>
				<td>{{$client->contact}}</td>
			</tr>
			<tr>
				<td>Document</td>
				<td>{{$client->document}}</td>
			</tr>
			<tr>
				<td>Adrress</td>
				<td>{{$client->adrress}}</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>{{$client->phone}}</td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>{{$client->email}}</td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td>{{$client->mobile}}</td>
			</tr>
			<tr>
				<td>Fax</td>
				<td>{{$client->fax}}</td>
			</tr>
			<tr>
				<td>Type</td>
				<td>{{$client->types['type']}}</td>
			</tr>
		</tbody>
	</table>

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('clients.index') !!}">
	  	<button type="button" class="btn btn-default">Back</button>
	  </a>

	  <a href="{!! route('clients.edit', ['id' => $client->id]) !!}">
	  	<button type="button" class="btn btn-primary">Edit</button>
	  </a>

	  <a href="{!! route('clients.destroy', ['id' => $client->id]) !!}">
	  	<button type="button" class="btn btn-danger">Delete</button>
	  </a>
	</div>

@endsection