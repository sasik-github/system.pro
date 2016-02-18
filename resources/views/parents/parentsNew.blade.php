@extends('layout.form')

@section('title')
	Создать родителя
@endsection

@section('form')

	{!! Form::open(['action' => ['ParentsController@postNew']]) !!}

        <div class="form-group">
            <label for="fio">ФИО</label>
            {!! Form::text('fio', null, ['id' => 'fio', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="account">Баланс</label>
            {!! Form::text('account', null, ['id' => 'account', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="tariff_id">Тариф</label>


            {!! Form::select('tariff_id', $tariffs, null, ['id' => 'tariff_id', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="phone_type_id">Тип устройства</label>
            {!! Form::text('phone_type_id', null, ['id' => 'phone_type_id', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="telephone">Телефон</label>
            {!! Form::text('telephone', null, ['id' => 'telephone', 'class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Создать', ['class' => 'btn btn-primary']) !!}


	{!! Form::close() !!}

@endsection