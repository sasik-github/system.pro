@extends('layout.main')

@section('title')
    Пополнение счета
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{--<div class="row">--}}
                <div class="alert alert-danger">
                    <div class="row">
                        <div class="col-md-6">
                            Извините, платеж не был совершён.
                        </div>
                        <div class="col-md-6">
                            <a href="{{ action('PaymentController@getIndex') }}" class="btn btn-danger">Повторить платеж</a>
                            <a href="{{ action('ParentProfileController@getIndex') }}" class="btn btn-default">Перейти в личный кабинет</a>
                        </div>
                    </div>
                </div>
            {{--</div>--}}

        </div>
    </div>
@endsection

