@extends('layout.main')

@section('title')
    Выбор тарифа
@endsection

@section('content')
    <section id="pricing">
        <div class="container">
            <h2>Что то пошло не так...</h2>
            <div class="alert alert-danger">
                {{ $failMessage }}
            </div>
            <p><a href="{{ action('PaymentController@getIndex') }}"> Пополнить счет</a></p>
        </div>
    </section>
@endsection