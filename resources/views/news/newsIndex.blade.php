@extends('layout.main')

@section('title')
    Новости
@endsection


@section('content')

    <div class="row">
        @foreach($newses as $news)
            <div class="col-md-4">
                <h2>{{ $news->title }}</h2>
                <p>{{$news->text }}</p>
                <p>
                    <a href="#" class="btn btn-default">Подробней..</a>
                </p>
            </div>
        @endforeach
    </div>
@endsection
