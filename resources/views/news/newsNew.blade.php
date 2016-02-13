@extends('layout.form')

@section('title')
    Создать Новость
@endsection


@section('form')
    <div class="row">
        {!! Form::open(['action' => 'NewsController@postNew', 'class' => 'form']) !!}

            @include('news._newsForm', ['submitButtonText' => 'Создать'])

        {!! Form::close() !!}
    </div>
@endsection
