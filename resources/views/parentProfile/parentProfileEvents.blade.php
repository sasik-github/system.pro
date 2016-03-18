@extends('layout.main')

@section('title')
    Личные кабинет
@endsection

@section('content')


    {{ $child->fio }}

    @include('parentProfile._childEvents', ['events' => $child->events()->paginate(10)])


@endsection