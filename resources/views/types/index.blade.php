@extends('layouts.app')

@section('content')

	<table class="table">

		<thead>
			<tr>
				<th>ID</th>
				<th>Type Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach($types as $type)

				<tr>
					<td>{{$type->id}}</td>
					<td>{{$type->type}}</td>
				</tr>

			@endforeach

		</tbody>

	</table>

@endsection