@extends('layout.main')

@section('title')
    Пополнение счета
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <p>Введите сумму, которую хотите перечислить на счет. Нажмите оплатить</p>
            </div>
            <div class="row">
                {!! $button !!}
            </div>
        </div>
    </div>

@endsection

