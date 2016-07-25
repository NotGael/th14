@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Homepage</h1>
    </div>
    <div class="row">
        <h2>Rappels</h2>
        <ul>
        @foreach($reminders as $reminder)
            <li>{{ $reminder->content }}</li>
        @endforeach
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h2>Calendrier</h2>
            <p>TODO<p>
            <p>TODO<p>
            <p>TODO<p>
            <p>TODO<p>
        </div>
        <div class="col-md-6">
            <h2>Dernier article</h2>

                <h3>{{ $post->title }}</h3>
                @if($post->user)
                    <p><em>
                        {{ $post->user->name }}
                        @if($post->section)
                            {{ $post->section->name }}
                        @endif
                    </em></p>
                @endif
                <p>{{ $post->content }}</p>

        </div>
    </div>

    <div class="row">
        <h2>Photos</h2>
        <ul>
        @foreach($photographies as $photography )
            <li>
              <img src="/th14/public/imgs/photographies/thumbnails/{{ 'thumb-'. $photography->image_name . '.' .
                  $photography->image_extension }}">
            </li>
        @endforeach
        </ul>
    </div>

    <div class="row">
        <div class="list-group">
            <h1>Fonctionnalité implémentée</h1>
            <h2>Reminders</h2>
            <a href="{{route('reminders.create')}}" class="list-group-item">Création de rappels</a>
            <a href="{{route('reminders.index')}}" class="list-group-item">Liste des rappels</a>
            <h2>Sections</h2>
            <a href="{{route('sections.create')}}" class="list-group-item">Création de sections</a>
            <a href="{{route('sections.index')}}" class="list-group-item">Liste des sections</a>
            <h2>Photos</h2>
            <a href="{{route('photographies.create')}}" class="list-group-item">Upload de photos</a>
            <a href="{{route('photographies.index')}}" class="list-group-item">Liste des photos</a>
            <h2>News</h2>
            <a href="{{route('news.create')}}" class="list-group-item">Création d'articles</a>
            <a href="{{route('news.index')}}" class="list-group-item">Liste des articles</a>
        </div>
    </div>

</div>
@endsection
