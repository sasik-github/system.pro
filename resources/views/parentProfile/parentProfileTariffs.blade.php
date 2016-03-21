@extends('layout.main')

@section('title')
Личные кабинет
@endsection

@section('content')
    <h2> Выбрать тариф</h2>

    <div class="row">
        @include('parentProfile._tariffChooserForm')
    </div>


@endsection