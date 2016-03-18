@inject('fileSystem', 'App\Models\Helpers\FileSystem')

@extends('layout.main')

@section('title')
    {{ $news->title }}
@endsection

@section('content')
    <img src="/{{ $news->image }}" alt="" class="img-responsive">
    <p>{{ $news->text }}</p>
@endsection
