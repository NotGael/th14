@extends('layouts.app')

@section('content')

    @foreach($posts as $post)
        <h2>{{ $post->title }}</h1>
        @if($post->category)
            <p><em>{{ $post->section->name }}</em></p>
        @endif
        <p>{{ $post->content }}</p>
        <p><a class="btn btn-primary" href="{{route('admin.news.edit', $post)}}">Editer</a></p>
    @endforeach

@endsection
