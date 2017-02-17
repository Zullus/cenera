@extends('layouts.app')

@section('content')

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Type</th>
	      <th>Process Number</th>
	      <th>Client</th>
	      <th>Opponent</th>
	      <th>Responsable</th>
	      <th>Court</th>
	      <th>Process</th>
	      <th>Offense</th>
	      <th>Attorney</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($lawsuits as $lawsuit)

	    	<tr>
		      <th scope="row">{{$lawsuit->id}}</th>
		      <td>{{$lawsuit->types['type']}}</td>
		      <td>{{$lawsuit->process_number}}</td>
		      <td>
		      	<a href="{!! route('clients.show', ['id' => $lawsuit->client]) !!}">
		      		{{$lawsuit->clients['name']}}
		      	</a>
		      </td>
		      <td>
		      	<a href="{!! route('clients.show', ['id' => $lawsuit->opponent]) !!}">
		      		{{$lawsuit->opponents['name']}}
		        </a>
		  	  </td>
		      <td>
		      	<a href="{!! route('clients.show', ['id' => $lawsuit->responsable]) !!}">
		      		{{$lawsuit->responsables['name']}}
		      	</a>
		      </td>
		      <td>
		      	<a href="{!! route('courts.show', ['id' => $lawsuit->court]) !!}">
		      		{{$lawsuit->courts['court']}}
		      	</a>
		      </td>
		      <td>{{$lawsuit->process}}</td>
		      <td>{{$lawsuit->offense}}</td>
		      <td>
		      	<a href="{!! route('clients.show', ['id' => $lawsuit->attorney]) !!}">
		      		{{$lawsuit->attorneys['name']}}
		      	</a>
		      </td>
		    </tr>

		@endforeach

	  </tbody>
	</table>

	{!!$lawsuits->appends(Request::except('page'))->render()!!}

@endsection