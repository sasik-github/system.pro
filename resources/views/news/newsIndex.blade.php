@inject('fileSystem', 'App\Models\Helpers\FileSystem')

@extends('layout.main')

@section('title')
    Новости
@endsection


@section('content')
    @if (!Auth::guest())
        @if (auth()->user()->isAdmin())
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ action('NewsController@getNew') }}" class="btn btn-primary">Создать</a>
                </div>
            </div>
            <br>
        @endif
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="blog">
                @foreach($newses as $key => $news)
                    {{--<div class="row">--}}
                        @if ($key % 3 === 0)
                            <div class="row">
                        @endif
                        <div class="col-sm-4">
                            <div class="blog-item">
                                <div class="thumbnail">
                                    {{$key % 3}}
                                    <img src="{{ $news->image }}" alt="" class="img-responsive img-blog">
                                    <div class="blog-content">
                                        <a href="{{ action('NewsController@getShow', $news->id) }}"><h3>{{ $news->title }}</h3></a>

                                        <p>{{$news->text }}</p>

                                        <div class="btn-group" role="group" aria-label="">
                                            <a href="{{ action('NewsController@getShow', $news->id) }}" class="btn btn-default" role="button">Подробней..</a>
                                            @if (!Auth::guest())
                                                @if (auth()->user()->isAdmin())
                                                    <a href="{{ action('NewsController@getEdit', $news->id) }}" class="btn btn-primary" role="button">редактировать</a>
                                                    @include('common._deleteFormObj', ['action' => 'NewsController@postDelete', 'id' => $news->id])
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($key % 3 == 2)
                            </div>
                        @endif
                    {{--</div>--}}
                @endforeach
            </div>

        </div>

    </div>

    <div class="row text-center">
        <div class="">
            {!! $newses->links() !!}
        </div>
    </div>
@endsection
