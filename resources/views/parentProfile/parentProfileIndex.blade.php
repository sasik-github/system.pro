@extends('layout.main')

@section('title')
    Личные кабинет
@endsection

@section('content')

    <div class="row">

        <div class="col-sm-6">
            @include('parentProfile._personalData', ['parent' => $parent])
        </div>
        <div class="col-sm-6">
            @include('parentProfile._personalChildrenData', ['children' => $parent->children])
        </div>

    </div>

@endsection