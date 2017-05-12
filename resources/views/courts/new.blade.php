@extends('layouts.app')

@section('content')

	<h2>Nueva Corte</h2>

	@if(Session::has('success'))

		<div class="alert alert-success alert-dismissible" role="alert">

		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Sucesso!</strong> {{Session::get('success')}}

		</div>

	@endif

	{!! Form::open(['url' => route('courts.store'), 'class' => 'category-form']) !!}

		<table class="table">
			<thead>
				<tr>
					<td>
						<strong>Nombre de la Corte</strong>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						{!! Form::text('court', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba o nombre de la corte']) !!}
					</td>
				</tr>
			</tbody>
		</table>

		<button type="submit" class="btn btn-info">Enviar</button>

	{!! Form::close() !!}

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('courts.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>
	</div>

@endsection