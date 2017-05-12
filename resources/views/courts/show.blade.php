@extends('layouts.app')

@section('content')

	<h2>Data form court {{$court->court}}</h2>

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
				<td>{{$court->id}}</td>
			</tr>
			<tr>
				<td>Courte</td>
				<td>{{$court->court}}</td>
			</tr>
		</tbody>
	</table>

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('courts.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>

	  <a href="{!! route('courts.edit', ['id' => $court->id]) !!}">
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
		    window.location = "{!! route('courts.destroy', ['id' => $court->id]) !!}";
		}

	}
</script>

@endsection