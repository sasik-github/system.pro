@extends('layout.main')

@section('title')
    Авторизация на сайте
@endsection

@section('content')
    <section id="registration" class="container">
        @include('auth._loginForm')
    </section>
@endsection
