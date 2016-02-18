@extends('layout.form')

@section('title')
    Создать Тариф
@endsection

@section('form')

    {!! Form::open(['action' => ['TariffsController@postNew']]) !!}


        <div class="form-group">
            <label for="name">Название</label>
            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="price">Цена</label>
            {!! Form::text('price', null, ['id' => 'price', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="duration">Длительность(сутки)</label>
            {!! Form::text('duration', null, ['id' => 'duration', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="is_privileged">Привилегированный?</label>
            {!! Form::checkbox('is_privileged', null, null, ['id' => 'is_privileged', 'class' => 'checkbox']) !!}
        </div>

        {!! Form::submit('Создать', ['class' => 'btn btn-primary']) !!}


    {!! Form::close() !!}

@endsection