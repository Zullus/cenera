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
				<td>Name</td>
				<td>
					{!! Form::text('name', $client->name, ['class' => 'form-control select2', 'placeholder' => 'Type a Name']) !!}
				</td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>
					{!! Form::text('lastname', $client->lastname, ['class' => 'form-control select2', 'placeholder' => 'Type a Name']) !!}
				</td>
			</tr>
			<tr>
				<td>Contact</td>
				<td>
					{!! Form::text('contact', $client->contact, ['class' => 'form-control select2', 'placeholder' => 'Type a Last Name']) !!}
				</td>
			</tr>
			<tr>
				<td>Document</td>
				<td>
					{!! Form::text('document', $client->document, ['class' => 'form-control select2', 'placeholder' => 'Type a document']) !!}
				</td>
			</tr>
			<tr>
				<td>Adrress</td>
				<td>
					{!! Form::text('adrress', $client->adrress, ['class' => 'form-control select2', 'placeholder' => 'Type a document']) !!}
				</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>
					{!! Form::text('phone', $client->phone, ['class' => 'form-control select2', 'placeholder' => 'Type a document']) !!}
				</td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>
					{!! Form::email('email', $client->email, ['class' => 'form-control select2', 'placeholder' => 'Type a e-mail']) !!}
				</td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td>
					{!! Form::text('mobile', $client->mobile, ['class' => 'form-control select2', 'placeholder' => 'Type a mobile']) !!}
				</td>
			</tr>
			<tr>
				<td>Fax</td>
				<td>
					{!! Form::text('fax', $client->fax, ['class' => 'form-control select2', 'placeholder' => 'Type a fax']) !!}
				</td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					{!! Form::select('type', $alltypes, $client->type, ['class' => 'form-control select2', 'placeholder' => 'Select a Type']) !!}
				</td>
			</tr>
		</tbody>
	</table>

	<button type="submit" class="btn btn-info">Send</button>

	{!! Form::close() !!}

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('clients.index') !!}">
	  	<button type="button" class="btn btn-default">Back</button>
	  </a>
	</div>

@endsection