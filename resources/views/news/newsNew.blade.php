@extends('layout.main')

@section('title')
    Создать Новость
@endsection


@section('content')
    @include('common.errors')
    <div class="row">
        {!! Form::open(['action' => 'NewsController@postNew', 'class' => 'form']) !!}

            @include('news._newsForm', ['submitButtonText' => 'Создать'])

        {!! Form::close() !!}
    </div>
@endsection
