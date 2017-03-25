@extends('layouts.app')

@section('content')

	<h2>Formulario de datos pleito #{{$lawsuit->process_number}}</h2>

	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Sucess!</strong> {{Session::get('success')}}
	</div>
	@endif

	{!! Form::open(['url' => route('lawsuits.update', ['id' => $selectedLawsuit]), 'class' => 'category-form']) !!}

	{!! Form::hidden('id', $lawsuit->id) !!}

	<table class="table">
		<thead>
			<tr>
				<td><strong>Fields</strong></td>
				<td><strong>Values</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tipo</td>
				<td>{!! Form::select('types', $alltypes, $lawsuit->type, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un tipo']) !!}</td>
			</tr>
			<tr>
				<td>N° Expediente</td>
				<td>
					{!! Form::text('process', $lawsuit->process, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Proceso']) !!}
				</td>
			</tr>
			<tr>
				<td>Número de proceso</td>
				<td>
					{!! Form::text('process_number', $lawsuit->process_number, ['class' => 'form-control select2', 'placeholder' => 'Escriba un número de proceso']) !!}
				</td>
			</tr>
			<tr>
				<td>Cliente(s)</td>
				<td>
					@if(isset($lawsuit->clients['name']))
			      		{{$lawsuit->clients['name']}} 
			      		<a href="{!! route('lawsuits.remove_client', ['id' => $lawsuit->id, 'client' => 0, 'param' => 'client']) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a>
			      	@else
			      		@if($lawsuit->lastname != '')
			      			{{$lawsuit->lastname}}, 
			      		@endif

						{{$lawsuit->name}} 
						<a href="{!! route('lawsuits.remove_client', ['id' => $lawsuit->id, 'client' => 0, 'param' => 'client']) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a>
					@endif

					@if(isset($more_clients))

						@if(!is_null($more_clients))

							<br>

							@foreach($more_clients as $kc => $mcl)

								{{$mcl}} 
								<a href="{!! route('lawsuits.remove_client', ['id' => $lawsuit->id, 'client' => $kc+1, 'param' => 'client']) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a><br>

							@endforeach

						@endif

					@endif

					{!! Form::select('client', $allclients, $lawsuit->client, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Cliente']) !!}
				</td>
			</tr>
			<tr>
				<td>Adversario(s)</td>
				<td>
					@if(isset($lawsuit->opponents['name']))
			      		{{$lawsuit->opponents['name']}} 
			      		<a href="{!! route('lawsuits.remove_client', ['id' => $lawsuit->id, 'client' => 0, 'param' => 'opponent']) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a>
			      	@else
			      		@if($lawsuit->opponentlastname != '')
			      			{{$lawsuit->opponentlastname}}, 
			      		@endif

						{{$lawsuit->opponentname}} 
						<a href="{!! route('lawsuits.remove_client', ['id' => $lawsuit->id, 'client' => $ko+1, 'param' => 'opponent']) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a>
					@endif

					@if(isset($more_opponents))

						@if(!is_null($more_opponents))

							<br>

							@foreach($more_opponents as $ko => $mo)

								{{$mo}} 
								<a href="{!! route('lawsuits.remove_client', ['id' => $lawsuit->id, 'client' => $ko+1, 'param' => 'opponent']) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a><br>

							@endforeach

						@endif

					@endif

					{!! Form::select('opponent', $allclients, $lawsuit->opponent, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Adversario']) !!}
				</td>
			</tr>
			<tr>
				<td>Responsable</td>
				<td>
					{!! Form::select('responsable', $allclients, $lawsuit->responsable, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Responsable']) !!}
				</td>
			</tr>
			<tr>
				<td>Procurador</td>
				<td>
					{!! Form::select('attorney', $allclients, $lawsuit->attorney, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Abogado']) !!}
				</td>
			</tr>
			<tr>
				<td>Corte(s)</td>
				<td>
					@if(isset($lawsuit->courts['court']))
			      		{{$lawsuit->courts['court']}} 
			      		<a href="{!! route('lawsuits.remove_court', ['id' => $lawsuit->id, 'client' => 0]) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a>
			      	@else
						{{$lawsuit->courtname}} 
						<a href="{!! route('lawsuits.remove_court', ['id' => $lawsuit->id, 'client' => 0]) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a>
					@endif

					@if(isset($more_courts))

						@if(!is_null($more_courts))

							<br>

							@foreach($more_courts as $co => $mc)

								{{$mc}} 
								<a href="{!! route('lawsuits.remove_court', ['id' => $lawsuit->id, 'client' => $co+1]) !!}" class="remover"><i class="fa fa-close" aria-hidden="true"></i>eliminar</a><br>

							@endforeach

						@endif

					@endif

					{!! Form::select('court', $allcourts, $lawsuit->court, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un Corte']) !!}
				</td>
			</tr>
			<tr>
				<td>Ofensa</td>
				<td>
					{!! Form::textarea ('offense', $lawsuit->offense, ['class' => 'form-control select2', 'placeholder' => 'Escriba un Ofensa']) !!}
				</td>
			</tr>
		</tbody>
	</table>

	<button type="submit" class="btn btn-info">Enviar</button>

	{!! Form::close() !!}

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('lawsuits.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>
	</div>

@endsection