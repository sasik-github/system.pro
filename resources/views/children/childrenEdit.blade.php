	@extends('layout.form')

@section('title')
	Редактировать профиль ребенка
@endsection

@section('form')
	{!!	Form::model($child, ['action' => ['ChildrenController@postEdit', $child->id]]) !!}

		@include('children._childForm', ['submitButtonText' => 'Сохранить'])

	{!!	Form::close() !!}
@endsection
