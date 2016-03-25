@extends('layout.main')

@section('title')
Выбор тарифа
@endsection

@section('content')
    <section id="pricing">
        <div class="container">
            <div class="center">
                <h2> Ознокомьтесь с нашими тарифами</h2>
            </div>
            <div class="gap"></div>
            <div id="pricing-table" class="row">
                @include('parentProfile._tariffChooserForm')
            </div>
        </div>
    </section>


    <div class="row">

    </div>


@endsection