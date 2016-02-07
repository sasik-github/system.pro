@extends('layout.main')

@section('title')
    Редактировать новость
@endsection


@section('content')
    @include('common.errors')
    <div class="row">
        {!! Form::model($news, ['action' => ['NewsController@postEdit', $news->id], 'class' => 'form']) !!}

        @include('news._newsForm', ['submitButtonText' => 'Сохранить'])

        {!! Form::close() !!}
    </div>
@endsection
