@extends('layouts.app')

@section('content')

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Corte</th>
	    </tr>
	  </thead>
	  <tbody>

		@foreach($courts as $court)

			<tr>
		      <th scope="row">{{$court->id}}</th>
		      <td>{{$court->court}}</td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

	{!!$courts->appends(Request::except('page'))->render()!!}

	<br>

	<a href="{!! route('courts.create') !!}">
		<button class="btn btn-primary">Añadir nueva Corte</button>
	</a>

@endsection