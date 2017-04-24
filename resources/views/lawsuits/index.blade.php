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
				{!! Form::text('search', $busca, ['class' => 'form-control col-md-4 select2', 'placeholder' => 'Haz tu búsqueda por nombre']) !!}

				<button class="btn btn-primary">Buscar</button>

			{!! Form::close() !!}
		</div>
	</div>

	<table class="table">
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Tipo</th>
	      <th>N° Expediente</th>
	      <th>Número de proceso</th>
	      <th>Cliente</th>
	      <th>Procurador</th>
	      <th>Corte</th>
	      <th>Ofensa</th>
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
		      <td>
		      	@if(isset($lawsuit->types['type']))
		      		{{$lawsuit->types['type']}}
		      	@else
					{{$lawsuit->typename}}
				@endif
		      </td>
		      <td>{{$lawsuit->process}}</td>
		      <td>{{$lawsuit->process_number}}</td>
		      <td>
		      	<a href="{!! route('clients.show', ['id' => $lawsuit->client]) !!}">
		      		@if(isset($lawsuit->clients['name']))
			      		{{$lawsuit->clients['name']}}
			      	@else
			      		@if($lawsuit->lastname != '')
			      			{{$lawsuit->lastname}}, 
			      		@endif

						{{$lawsuit->name}}
					@endif
		      	</a>
		      </td>
			  <td>
		      	<a href="{!! route('clients.show', ['id' => $lawsuit->attorney]) !!}">
		      		@if(isset($lawsuit->attorneys['name']))
			      		{{$lawsuit->attorneys['name']}}
			      	@else
			      		@if($lawsuit->attorneylastname != '')
			      			{{$lawsuit->attorneylastname}}, 
			      		@endif

						{{$lawsuit->attorneyname}}
					@endif
		      	</a>
		      </td>
		      <td>
		      	<a href="{!! route('courts.show', ['id' => $lawsuit->court]) !!}">
		      		@if(isset($lawsuit->courts['court']))
			      		{{$lawsuit->courts['court']}}
			      	@else
						{{$lawsuit->courtname}}
					@endif
		      	</a>
		      </td>
		      <td>{{substr($lawsuit->offense, 0, 50)}}...</td>
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