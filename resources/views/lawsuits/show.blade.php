@extends('layouts.app')

@section('content')

	<h2>Formulario de datos pleito #{{$lawsuit->process_number}}</h2>

	<table class="table">
		<thead>
			<tr>
				<td><strong>Campos</strong></td>
				<td><strong>Valor</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>id</td>
				<td>{{$lawsuit->id}}</td>
			</tr>
			<tr>
				<td>Tipo</td>
				<td>
					@if(isset($lawsuit->types['type']))
			      		{{$lawsuit->types['type']}}
			      	@else
						{{$lawsuit->typename}}
					@endif
				</td>
			</tr>
			<tr>
				<td>Proceso</td>
				<td>{{$lawsuit->process}}</td>
			</tr>
			<tr>
				<td>Número de proceso</td>
				<td>{{$lawsuit->process_number}}</td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td>
					@if(isset($lawsuit->clients['name']))
			      		{{$lawsuit->clients['name']}}
			      	@else
			      		@if($lawsuit->lastname != '')
			      			{{$lawsuit->lastname}}, 
			      		@endif

						{{$lawsuit->name}}
					@endif
				</td>
			</tr>
			<tr>
				<td>Adversario</td>
				<td>
					@if(isset($lawsuit->opponents['name']))
			      		{{$lawsuit->opponents['name']}}
			      	@else
			      		@if($lawsuit->opponentlastname != '')
			      			{{$lawsuit->opponentlastname}}, 
			      		@endif

						{{$lawsuit->opponentname}}
					@endif
				</td>
			</tr>
			<tr>
				<td>Responsable</td>
				<td>
					@if(isset($lawsuit->responsables['name']))
			      		{{$lawsuit->responsables['name']}}
			      	@else
			      		@if($lawsuit->responsablelastname != '')
			      			{{$lawsuit->responsablelastname}}, 
			      		@endif

						{{$lawsuit->responsablename}}
					@endif
				</td>
			</tr>
			<tr>
				<td>Procurador</td>
				<td>
					@if(isset($lawsuit->attorneys['name']))
			      		{{$lawsuit->attorneys['name']}}
			      	@else
			      		@if($lawsuit->attorneylastname != '')
			      			{{$lawsuit->attorneylastname}}, 
			      		@endif

						{{$lawsuit->attorneyname}}
					@endif
				</td>
			<tr>
				<td>Corte</td>
				<td>
					@if(isset($lawsuit->courts['name']))
			      		{{$lawsuit->courts['name']}}
			      	@else
						{{$lawsuit->courtname}}
					@endif
				</td>
			</tr>
			<tr>
				<td>Ofensa</td>
				<td>{{$lawsuit->offense}}</td>
			</tr>
			</tr>
		</tbody>
	</table>

	<div class="btn-group" role="group" aria-label="...">
	  <a href="{!! route('lawsuits.index') !!}">
	  	<button type="button" class="btn btn-default">Volver</button>
	  </a>

	  <a href="{!! route('lawsuits.edit', ['id' => $lawsuit->id]) !!}">
	  	<button type="button" class="btn btn-primary">Editar</button>
	  </a>

	  <a href="{!! route('lawsuits.destroy', ['id' => $lawsuit->id]) !!}">
	  	<button type="button" class="btn btn-danger">Apagar</button>
	  </a>
	</div>

@endsection