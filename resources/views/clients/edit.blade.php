@extends('layouts.app')

@section('content')

	<h2>Data form person {{$client->name}} {{$client->lastname}}</h2>

	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Sucess!</strong> {{Session::get('success')}}
	</div>
	@endif

	{!! Form::open(['url' => route('clients.update', ['id' => $selectedClient]), 'class' => 'category-form']) !!}

	{!! Form::hidden('id', $client->id) !!}


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
				<td>
					{!! Form::text('name', $client->name, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Nombre']) !!}
				</td>
			</tr>
			<tr>
				<td>Apellido</td>
				<td>
					{!! Form::text('lastname', $client->lastname, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Apellido']) !!}
				</td>
			</tr>
			<tr>
				<td>Contacto</td>
				<td>
					{!! Form::text('contact', $client->contact, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Contacto']) !!}
				</td>
			</tr>
			<tr>
				<td>DNI</td>
				<td>
					{!! Form::text('document', $client->document, ['class' => 'form-control select2', 'placeholder' => 'Escriba un DNI']) !!}
				</td>
			</tr>
			<tr>
				<td>Dirección</td>
				<td>
					{!! Form::text('adrress', $client->adrress, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Dirección']) !!}
				</td>
			</tr>
			<tr>
				<td>Teléfono</td>
				<td>
					{!! Form::text('phone', $client->phone, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Teléfono']) !!}
				</td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>
					{!! Form::email('email', $client->email, ['class' => 'form-control select2', 'placeholder' => 'Escriba un e-mail']) !!}
				</td>
			</tr>
			<tr>
				<td>Móvil</td>
				<td>
					{!! Form::text('mobile', $client->mobile, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Móvil']) !!}
				</td>
			</tr>
			<tr>
				<td>Fax</td>
				<td>
					{!! Form::text('fax', $client->fax, ['class' => 'form-control select2', 'placeholder' => 'Escriba un fax']) !!}
				</td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>
					{!! Form::select('type', $alltypes, $client->type, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Tipo']) !!}
				</td>
			</tr>
		</tbody>
	</table>

	<button type="submit" class="btn btn-info">Enviar</button>

	{!! Form::close() !!}

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('clients.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>
	</div>

@endsection