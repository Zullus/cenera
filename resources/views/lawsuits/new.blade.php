@extends('layouts.app')

@section('content')

	<h2>Nuevo Pleito</h2>

	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Sucesso!</strong> {{Session::get('success')}}
	</div>
	@endif

	{!! Form::open(['url' => route('lawsuits.store'), 'class' => 'category-form']) !!}

	<table class="table">
		<thead>
			<tr>
				<td><strong>Campos</strong></td>
				<td><strong>Valores</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tipo</td>
				<td>{!! Form::select('types', $alltypes, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un tipo']) !!}</td>
			</tr>
			<tr>
				<td>N° Expediente</td>
				<td>
					{!! Form::text('process', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Proceso']) !!}
				</td>
			</tr>
			<tr>
				<td>Número de proceso</td>
				<td>
					{!! Form::text('process_number', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un número de proceso']) !!}
				</td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td>
					{!! Form::select('client', $allclients, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Cliente']) !!}
				</td>
			</tr>
			<tr>
				<td>Adversario</td>
				<td>
					{!! Form::select('opponent', $allclients, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Adversario']) !!}
				</td>
			</tr>
			<tr>
				<td>Responsable</td>
				<td>
					{!! Form::select('responsable', $allclients, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Responsable']) !!}
				</td>
			</tr>
			<tr>
				<td>Procurador</td>
				<td>
					{!! Form::select('attorney', $allclients, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Abogado']) !!}
				</td>
			</tr>
			<tr>
				<td>Corte</td>
				<td>
					{!! Form::select('court', $allcourts, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Corte']) !!}
				</td>
			</tr>
			<tr>
				<td>Ofensa</td>
				<td>
					{!! Form::textarea ('offense', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Ofensa']) !!}
				</td>
			</tr>

		</tbody>
	</table>

	<button type="submit" class="btn btn-info">Enviar</button>

	{!! Form::close() !!}

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('lawsuits.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>
	</div>

@endsection