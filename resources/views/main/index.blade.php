@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ route('home') }}">
                <h1>TH14</h1>
            </a>
        </div>
        <div class="row">
            <div class="col-md-8">
                <a href="{{ url('/rappels') }}">
                    <h2>Rappels</h2>
                </a>
                @if(isset($reminders))
                    <ul class="list-unstyled">
                        @foreach($reminders as $reminder)
                            <li>
                                @if($reminder->section)
                                    @if($reminder->section->id == 1)
                                        <p class="text-info">
                                    @elseif($reminder->section->id == 2)
                                        <p class="text-success">
                                    @elseif($reminder->section->id == 3)
                                        <p class="text-primary">
                                    @elseif($reminder->section->id == 4)
                                        <p class="text-danger">
                                    @elseif($reminder->section->id == 5)
                                        <p class="text-warning">
                                    @endif
                                    {{ $reminder->content }}
                                    <em>-
                                        @if($reminder->user)
                                            @if($reminder->user->totem)
                                                {{ $reminder->user->totem }}
                                            @else
                                                {{ $reminder->user->firstname }} {{ $reminder->user->lastname }}
                                            @endif
                                        @endif
                                    </em></p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-md-4">
                <h2>Calendrier</h2>
                <ul class="list-unstyled">
                    <li>
                        TODO
                    </li>
                    <li>
                        TODO
                    </li>
                    <li>
                        TODO
                    </li>
                    <li>
                        TODO
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <a href="{{ url('/articles') }}">
                <h2>Derniers articles</h2>
            </a>
            @if(isset($posts))
                @foreach($posts as $post)
                    <div class="col-md-6">
                        <a href="{{ url('/articles') }}">
                            @if($post->section)
                                @if($post->section->id == 1)
                                    <h3 class="text-info">
                                @elseif($post->section->id == 2)
                                    <h3 class="text-success">
                                @elseif($post->section->id == 3)
                                    <h3 class="text-primary">
                                @elseif($post->section->id == 4)
                                    <h3 class="text-danger">
                                @elseif($post->section->id == 5)
                                    <h3 class="text-warning">
                                @endif
                            @endif
                            {{ $post->title }}</h3>
                        </a>
                        <p>
                            {{ $post->content }}
                        </p>
                        <p class="text-right">
                            <em>
                                @if($post->user)
                                    @if($post->user->totem)
                                        {{ $post->user->totem }}
                                    @else
                                        {{ $post->user->firstname }} {{ $post->user->lastname }}
                                    @endif
                                @endif
                            </em>
                        </p>
                    </div>
                @endforeach
            @endif
        </div>
        @if(Auth::user())
            @if(Auth::user()->grade >= 1)
                <div class="row">
                    <a href="{{ url('/photos') }}">
                        <h2>Photos</h2>
                    </a>
                    @if(isset($photographies))
                        <ul class="list-unstyled list-inline">
                            @foreach($photographies as $photography)
                                <li>
                                    <a href="{{ url('/photo/'.$photography->id) }}">
                                        <img src="/th14/public/imgs/photographies/thumbnails/thumb-{{ $photography->image_name . '.' . $photography->image_extension }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{ $photographies->links() }}
                    @endif
                </div>
            @endif
        @endif
    </div>
@endsection
