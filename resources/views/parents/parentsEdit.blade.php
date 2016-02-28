@extends('layout.form')

@section('title')
    Редактировать родителя
@endsection

@section('form')

    {!! Form::model($parent, ['action' => ['ParentsController@postEdit', $parent->id]]) !!}

        @include('parents._parentsForm')

        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}


    {!! Form::close() !!}

@endsection
