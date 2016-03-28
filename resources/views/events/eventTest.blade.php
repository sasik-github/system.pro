@extends('layout.form')

@section('title')
    Тестирование событий
@endsection

@section('form')

    {!! Form::open(['action' => ['EventsController@postTestEvent']]) !!}

        @include('events._eventForm')

    {!! Form::submit('Создать', ['class' => 'btn btn-primary']) !!}


    {!! Form::close() !!}

@endsection
