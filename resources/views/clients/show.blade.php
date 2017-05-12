@extends('layouts.app')

@section('content')

	<h2>Data form person {{$client->name}} {{$client->lastname}}</h2>

	@if($sucesso != '')
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Éxito!</strong> {{$sucesso}}
	</div>
	@endif

	<table class="table">
		<thead>
			<tr>
				<td><strong>Fields</strong></td>
				<td><strong>Values</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Nombre</td>
				<td>{{$client->name}}</td>
			</tr>
			<tr>
				<td>Apellido</td>
				<td>{{$client->lastname}}</td>
			</tr>
			<tr>
				<td>Contacto</td>
				<td>{{$client->contact}}</td>
			</tr>
			<tr>
				<td>DNI</td>
				<td>{{$client->document}}</td>
			</tr>
			<tr>
				<td>Dirección</td>
				<td>{{$client->adrress}}</td>
			</tr>
			<tr>
				<td>Teléfono</td>
				<td>{{$client->phone}}</td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>{{$client->email}}</td>
			</tr>
			<tr>
				<td>Móvil</td>
				<td>{{$client->mobile}}</td>
			</tr>
			<tr>
				<td>Fax</td>
				<td>{{$client->fax}}</td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>{{$client->types['type']}}</td>
			</tr>
		</tbody>
	</table>

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('clients.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>

	  <a href="{!! route('clients.edit', ['id' => $client->id]) !!}">
	  	<button type="button" class="btn btn-primary">Editar</button>
	  </a>

	  <a href="javascript:deleteConfirm()">
	  	<button type="button" class="btn btn-danger">Apagar</button>
	  </a>
	</div>

<script>
	function deleteConfirm(){

		var r = confirm("¿Estas seguro de que lo quieres borrar?");

		if (r == true) {
		    window.location = "{!! route('clients.destroy', ['id' => $client->id]) !!}";
		}

	}
</script>


@endsection