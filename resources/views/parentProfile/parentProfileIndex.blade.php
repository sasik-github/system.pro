@extends('layout.main')

@section('title')
    Личные кабинет
@endsection

@section('content')

    @include('parentProfile._personalData', ['parent' => $parent])
    @include('parentProfile._personalChildrenData', ['children' => $parent->children])

@endsection