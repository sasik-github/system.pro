@extends('layout.main')

@section('title')
    Личные кабинет
@endsection

@section('content')


    {{ $child->fio }}

    @include('parentProfile._childEvents', ['events' => $child->events()->paginate(10)])


    <div class="chart">
        <canvas id="myChart" width="800" height="400"></canvas>
    </div>
    <div>
        <div class='input-group date' id='chart_date'>
            <input type='text' class="form-control" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        <input type="hidden" id="chart_card_number" value="{{$child->card_number}}">
        {{ var_dump($child) }}
    </div>

@endsection
