@extends('layout.main')

@section('title')
    Импорт из Excel
@endsection

@section('content')

    @if (isset($success))
        <div class="row">
            <div class="alert alert-info">
                {{ $success }}
            </div>
        </div>
    @endif

    @if (isset($error))
        <div class="row">
            <div class="alert alert-danger"> {{ $error }}</div>
        </div>
    @endif

    {!! Form::open(['action' => 'ChildrenController@postImport', 'files' => true, 'class' => 'form']) !!}

        <div class="form-group">
            <label for="excel">Excel файл</label>
            {!! Form::file('excel', ['id' => 'excel']) !!}
        </div>


        {!! Form::submit('Начать импорт', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection