@extends('layouts.app')

@section('content')

	@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Error!</strong> {{Session::get('error')}}
	</div>
	@endif

	@if($busca != '')
	<p>
		<strong>
			Búsca por: {{$busca}}
		</strong>
	</p>
	@endif

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			{!! Form::open(['url' => route('lawsuits.search'), 'class' => 'category-form']) !!}
				{!! Form::text('search', $busca, ['class' => 'form-control col-md-4 select2', 'placeholder' => 'Haz tu búsqueda por número de proceso']) !!}

				<button class="btn btn-primary">Buscar</button>

			{!! Form::close() !!}
		</div>
	</div>

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Tipo</th>
	      <th>Número de proceso</th>
	      <th>Cliente</th>
	      <th>Adversario</th>
	      <th>Responsable</th>
	      <th>Corte</th>
	      <th>Proceso</th>
	      <th>Ofensa</th>
	      <th>Abogado</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($lawsuits as $lawsuit)

	    	<tr>
		      <th scope="row">
		      	<a href="{!! route('lawsuits.show', ['id' => $lawsuit->id]) !!}">
		      		{{$lawsuit->id}}
		      	</a>
		      </th>
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
		      <td>{{substr($lawsuit->offense, 0, 50)}}...</td>
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

	<br>

	<a href="{!! route('lawsuits.create') !!}">
		<button class="btn btn-primary">Añadir nuevo Pleitos</button>
	</a>

@endsection