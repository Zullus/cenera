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
				<td>Type</td>
				<td>{{$court->court}}</td>
			</tr>
		</tbody>
	</table>

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('courts.index') !!}">
	  	<button type="button" class="btn btn-default">Back</button>
	  </a>

	  <a href="{!! route('courts.edit', ['id' => $court->id]) !!}">
	  	<button type="button" class="btn btn-primary">Edit</button>
	  </a>

	  <a href="{!! route('courts.destroy', ['id' => $court->id]) !!}">
	  	<button type="button" class="btn btn-danger">Delete</button>
	  </a>
	</div>

@endsection