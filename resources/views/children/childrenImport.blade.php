@extends('layout.main')

@section('title')
    Импорт из Excel
@endsection

@section('content')


    {!! Form::open(['action' => 'ChildrenController@postImport', 'files' => true, 'class' => 'form']) !!}

        <div class="form-group">
            <label for="excel">Excel файл</label>
            {!! Form::file('excel', ['id' => 'excel']) !!}
        </div>


        {!! Form::submit('Начать импорт') !!}
    {!! Form::close() !!}

@endsection