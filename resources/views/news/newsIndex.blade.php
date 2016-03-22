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
    @foreach($newses as $news)
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="{{ $news->image }}" alt="" class="img-responsive">
                <div class="caption">
                    <h2>{{ $news->title }}</h2>
                    <p>{{$news->text }}</p>

                    <div class="btn-group" role="group" aria-label="    ">
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
    @endforeach
    </div>

    <div class="row text-center">
        <div class="">
            {!! $newses->links() !!}
        </div>
    </div>
@endsection
