@extends('layouts.app')

@section('content')

	@foreach($types as $type)
		{{$type->id}} - {{$type->type}}
	@endforeach

@endsection