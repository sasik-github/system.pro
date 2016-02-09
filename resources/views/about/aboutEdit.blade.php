@extends('layout.main')

@section('title')
    Редакитрование раздела "О Компании"
@endsection

@section('content')

    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

    @include('common.errors')

    {!! Form::model($about, ['action' => 'AboutController@postEdit']) !!}

        {{Form::textarea('text', null, ['rows' => 10, 'cols' => 80, 'id' => 'editor1'])}}
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>

        {!! Form::submit('Сохранить') !!}
    {!! Form::close() !!}


@endsection

