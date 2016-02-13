@extends('layout.form')

@section('title')
    Редактировать новость
@endsection


@section('form')
    <div class="row">
        {!! Form::model($news, ['action' => ['NewsController@postEdit', $news->id], 'class' => 'form']) !!}

        @include('news._newsForm', ['submitButtonText' => 'Сохранить'])

        {!! Form::close() !!}
    </div>
@endsection
