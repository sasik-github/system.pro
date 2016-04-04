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
        <input type="hidden" id="card_number" value="{{$child->card_number}}">
        {{ var_dump($child) }}
    </div>

@endsection
