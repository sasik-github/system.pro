@inject('fileSystem', 'App\Models\Helpers\FileSystem')

@extends('layout.main')

@section('title')
    Новости
@endsection


@section('content')

    <div class="row">
    @foreach($newses as $news)
        <div class="col-md-4">
            {{--<div class="col-md-4">--}}
                {{--<div class="center-block">--}}
                    <img src="{{ $news->image }}" alt="" class="img-responsive">
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-md-8">--}}
                <h2>{{ $news->title }}</h2>
                <p>{{$news->text }}</p>
                <p>
                    <a href="#" class="btn btn-default">Подробней..</a>
                </p>
            {{--</div>--}}
        </div>
    @endforeach
    </div>

    <div class="row text-center">
        <div class="">
            {!! $newses->links() !!}
        </div>
    </div>
@endsection
