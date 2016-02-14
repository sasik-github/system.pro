@extends('layout.form')

@section('title')
	Создать профиль ребенка
@endsection

@section('form')
	{!!	Form::open(['action' => 'ChildrenController@postNew']) !!}

		@include('children._childForm', ['submitButtonText' => 'Создать'])

	{!!	Form::close() !!}
@endsection
