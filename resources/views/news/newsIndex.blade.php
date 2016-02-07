@extends('layout.main')

@section('title')
    Новости
@endsection


@section('content')


    @foreach($newses as $news)
        <div class="row">
            <div class="col-md-4">
                <div class="center-block">
                    <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=200" alt="" class="img-responsive">
                </div>
            </div>

            <div class="col-md-8">
                <h2>{{ $news->title }}</h2>
                <p>{{$news->text }}</p>
                <p>
                    <a href="#" class="btn btn-default">Подробней..</a>
                </p>
            </div>
        </div>
    @endforeach

    <div class="row">
        {!! $newses->links() !!}
    </div>
@endsection
