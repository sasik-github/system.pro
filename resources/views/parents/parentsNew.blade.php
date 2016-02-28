@extends('layout.form')

@section('title')
	Создать родителя
@endsection

@section('form')

	{!! Form::open(['action' => ['ParentsController@postNew']]) !!}

        @include('parents._parentsForm')

        {!! Form::submit('Создать', ['class' => 'btn btn-primary']) !!}


	{!! Form::close() !!}

@endsection
