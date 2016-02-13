@extends('layout.main')

@section('title')
	Список детей
@endsection

@section('content')
	@foreach($children as $child)
		{{ $child->fio }}
		{{ $child->class }}
	@endforeach
@endsection