@extends('layouts.app')

@section('content')

	<h2>Formulario de datos pleito #{{$lawsuit->process_number}}</h2>

	<table class="table">
		<thead>
			<tr>
				<td><strong>Campos</strong></td>
				<td><strong>Valor</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>id</td>
				<td>{{$lawsuit->id}}</td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>{{$lawsuit->types['type']}}</td>
			</tr>
			<tr>
				<td>Número de proceso</td>
				<td>{{$lawsuit->process_number}}</td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td>{{$lawsuit->clients['name']}}</td>
			</tr>
			<tr>
				<td>Adversario</td>
				<td>{{$lawsuit->opponents['name']}}</td>
			</tr>
			<tr>
				<td>Responsable</td>
				<td>{{$lawsuit->responsables['name']}}</td>
			</tr>
			<tr>
				<td>Corte</td>
				<td>{{$lawsuit->courts['court']}}</td>
			</tr>
			<tr>
				<td>Proceso</td>
				<td>{{$lawsuit->process}}</td>
			</tr>
			<tr>
				<td>Ofensa</td>
				<td>{{$lawsuit->offense}}</td>
			</tr>
			<tr>
				<td>Abogado</td>
				<td>{{$lawsuit->attorneys['name']}}</td>
			</tr>
		</tbody>
	</table>

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('lawsuits.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>

	  <a href="{!! route('lawsuits.edit', ['id' => $lawsuit->id]) !!}">
	  	<button type="button" class="btn btn-primary">Editar</button>
	  </a>

	  <a href="{!! route('lawsuits.destroy', ['id' => $lawsuit->id]) !!}">
	  	<button type="button" class="btn btn-danger">Apagar</button>
	  </a>
	</div>

@endsection