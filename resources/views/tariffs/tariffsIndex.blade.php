@extends('layout.main')

@section('title')
    Список тарифов
@endsection

@section('content')
    <div class="row">
        <a href="{{ action('TariffsController@getNew') }}" class="btn btn-primary">Создать</a>
    </div>

    <div class="row">
        <table class="table">
            <caption></caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Длительность(сутки)</th>
                    <th>Привилегированный</th>
                    <th>действия</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tariffs as $tariff)
                    <tr>
                        <th>{{ $tariff->id }}</th>
                        <td>{{ $tariff->name }}</td>
                        <td>{{ $tariff->price }}</td>
                        <td>{{ $tariff->duration }}</td>
                        <td>
                            {!! $tariff->is_privileged ? '<span class="glyphicon glyphicon-ok"></span>' : '' !!}
                        </td>
                        <td>
                            @include('tariffs._tariffsDeleteForm', ['tariff' => $tariff])
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
