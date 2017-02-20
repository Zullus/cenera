@extends('layouts.app')

@section('content')

	<h2>Add a new person</h2>

	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Sucess!</strong> {{Session::get('success')}}
	</div>
	@endif

	{!! Form::open(['url' => route('clients.store'), 'class' => 'category-form']) !!}


	<table class="table">
		<thead>
			<tr>
				<td><strong>Campos</strong></td>
				<td><strong>Valores</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Nombre</td>
				<td>
					{!! Form::text('name', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Nombre']) !!}
				</td>
			</tr>
			<tr>
				<td>Apellido</td>
				<td>
					{!! Form::text('lastname', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Apellido']) !!}
				</td>
			</tr>
			<tr>
				<td>Contacto</td>
				<td>
					{!! Form::text('contact', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Contacto']) !!}
				</td>
			</tr>
			<tr>
				<td>DNI</td>
				<td>
					{!! Form::text('document', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un DNI']) !!}
				</td>
			</tr>
			<tr>
				<td>Dirección</td>
				<td>
					{!! Form::text('adrress', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Dirección']) !!}
				</td>
			</tr>
			<tr>
				<td>Teléfono</td>
				<td>
					{!! Form::text('phone', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Teléfono']) !!}
				</td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>
					{!! Form::email('email', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un e-mail']) !!}
				</td>
			</tr>
			<tr>
				<td>Móvil</td>
				<td>
					{!! Form::text('mobile', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Móvil']) !!}
				</td>
			</tr>
			<tr>
				<td>Fax</td>
				<td>
					{!! Form::text('fax', null, ['class' => 'form-control select2', 'placeholder' => 'Escriba un fax']) !!}
				</td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>
					{!! Form::select('types', $alltypes, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Tipo']) !!}
				</td>
			</tr>
		</tbody>
	</table>

	<button type="submit" class="btn btn-info">Enviar</button>

	{!! Form::close() !!}

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('clients.index') !!}">
	  	<button type="button" class="btn btn-default">Back</button>
	  </a>
	</div>

@endsection