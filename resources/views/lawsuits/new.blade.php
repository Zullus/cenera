@extends('layouts.app')

@section('content')

	<h2>New Lawsuit</h2>

	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Sucess!</strong> {{Session::get('success')}}
	</div>
	@endif

	{!! Form::open(['url' => route('lawsuits.store'), 'class' => 'category-form']) !!}

	<table class="table">
		<thead>
			<tr>
				<td><strong>Fields</strong></td>
				<td><strong>Values</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Type</td>
				<td>{!! Form::select('types', ['class' => 'form-control select2', 'placeholder' => 'Select a Type']) !!}</td>
			</tr>
			<tr>
				<td>Process Number</td>
				<td>
					{!! Form::text('process_number', ['class' => 'form-control select2', 'placeholder' => 'Type a Process Number']) !!}
				</td>
			</tr>
			<tr>
				<td>Client</td>
				<td>
					{!! Form::select('client', ['class' => 'form-control select2', 'placeholder' => 'Select a Client']) !!}</td>
			</tr>
			<tr>
				<td>Opponent</td>
				<td>
					{!! Form::select('opponent', ['class' => 'form-control select2', 'placeholder' => 'Select a Opponent']) !!}
				</td>
			</tr>
			<tr>
				<td>Responsable</td>
				<td>
					{!! Form::select('responsable', ['class' => 'form-control select2', 'placeholder' => 'Select a Responsable']) !!}
				</td>
			</tr>
			<tr>
				<td>Court</td>
				<td>
					{!! Form::select('court', ['class' => 'form-control select2', 'placeholder' => 'Select a Court']) !!}
				</td>
			</tr>
			<tr>
				<td>Process</td>
				<td>
					{!! Form::text('process', ['class' => 'form-control select2', 'placeholder' => 'Type a Process']) !!}
				</td>
			</tr>
			<tr>
				<td>Offense</td>
				<td>
					{!! Form::textarea ('offense', ['class' => 'form-control select2', 'placeholder' => 'Type a Offense']) !!}
				</td>
			</tr>
			<tr>
				<td>Attorney</td>
				<td>
					{!! Form::select('attorney', ['class' => 'form-control select2', 'placeholder' => 'Select a Attorney']) !!}
				</td>
			</tr>
		</tbody>
	</table>

	<button type="submit" class="btn btn-info">Send</button>

	{!! Form::close() !!}

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('lawsuits.index') !!}">
	  	<button type="button" class="btn btn-default">Back</button>
	  </a>
	</div>

@endsection