@extends('layout.main')

@section('title')
    Пополнение счета
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="alert alert-success">
                    <div class="row">
                        <div class="col-md-6">
                            На ваш счет зачислено {{ $summ }} руб.
                        </div>
                        <div class="col-md-6">
                            <a href="{{ action('ParentProfileController@getIndex') }}" class="btn btn-success">Перейти в личный кабинет</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

