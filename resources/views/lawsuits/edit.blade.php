@extends('layouts.app')

@section('content')

	<h2>Data form lawsuit #{{$lawsuit->process_number}}</h2>

	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Sucess!</strong> {{Session::get('success')}}
	</div>
	@endif

	{!! Form::open(['url' => route('lawsuits.update', ['id' => $selectedLawsuit]), 'class' => 'category-form']) !!}

	{!! Form::hidden('id', $lawsuit->id) !!}

	<table class="table">
		<thead>
			<tr>
				<td><strong>Fields</strong></td>
				<td><strong>Values</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tipo</td>
				<td>{!! Form::select('types', $alltypes, $lawsuit->type, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un tipo']) !!}</td>
			</tr>
			<tr>
				<td>Número de proceso</td>
				<td>
					{!! Form::text('process_number', $lawsuit->process_number, ['class' => 'form-control select2', 'placeholder' => 'Escriba un número de proceso']) !!}
				</td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td>
					{!! Form::select('client', $allclients, $lawsuit->client, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Cliente']) !!}
				</td>
			</tr>
			<tr>
				<td>Adversario</td>
				<td>
					{!! Form::select('opponent', $allclients, $lawsuit->opponent, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Adversario']) !!}
				</td>
			</tr>
			<tr>
				<td>Responsable</td>
				<td>
					{!! Form::select('responsable', $allclients, $lawsuit->responsable, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Responsable']) !!}
				</td>
			</tr>
			<tr>
				<td>Corte</td>
				<td>
					{!! Form::select('court', $allcourts, $lawsuit->court, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Corte']) !!}
				</td>
			</tr>
			<tr>
				<td>Proceso</td>
				<td>
					{!! Form::text('process', $lawsuit->process, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Proceso']) !!}
				</td>
			</tr>
			<tr>
				<td>Ofensa</td>
				<td>
					{!! Form::textarea ('offense', $lawsuit->offense, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Ofensa']) !!}
				</td>
			</tr>
			<tr>
				<td>Abogado</td>
				<td>
					{!! Form::select('attorney', $allclients, $lawsuit->attorney, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Abogado']) !!}
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