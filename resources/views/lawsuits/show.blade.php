@extends('layouts.app')

@section('content')

	<h2>Data form lawsuit #{{$lawsuit->id}}</h2>

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
				<td>{{$lawsuit->id}}</td>
			</tr>
			<tr>
				<td>Type</td>
				<td>{{$lawsuit->types['type']}}</td>
			</tr>
			<tr>
				<td>Process Number</td>
				<td>{{$lawsuit->process_number}}</td>
			</tr>
			<tr>
				<td>Client</td>
				<td>{{$lawsuit->clients['name']}}</td>
			</tr>
			<tr>
				<td>Opponent</td>
				<td>{{$lawsuit->opponents['name']}}</td>
			</tr>
			<tr>
				<td>Responsable</td>
				<td>{{$lawsuit->responsables['name']}}</td>
			</tr>
			<tr>
				<td>Court</td>
				<td>{{$lawsuit->courts['court']}}</td>
			</tr>
			<tr>
				<td>Process</td>
				<td>{{$lawsuit->process}}</td>
			</tr>
			<tr>
				<td>Offense</td>
				<td>{{$lawsuit->offense}}</td>
			</tr>
			<tr>
				<td>Attorney</td>
				<td>{{$lawsuit->attorneys['name']}}</td>
			</tr>
		</tbody>
	</table>

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('lawsuits.index') !!}">
	  	<button type="button" class="btn btn-default">Back</button>
	  </a>

	  <a href="{!! route('lawsuits.edit', ['id' => $lawsuit->id]) !!}">
	  	<button type="button" class="btn btn-primary">Edit</button>
	  </a>

	  <a href="{!! route('lawsuits.destroy', ['id' => $lawsuit->id]) !!}">
	  	<button type="button" class="btn btn-danger">Delete</button>
	  </a>
	</div>

@endsection