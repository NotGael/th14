@extends('layouts.app')

@section('content')
<div class="container">
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
                                    <p class="text-info"><em>
                                @elseif($reminder->section->id == 2)
                                    <p class="text-success"><em>
                                @elseif($reminder->section->id == 3)
                                    <p class="text-primary"><em>
                                @elseif($reminder->section->id == 4)
                                    <p class="text-danger"><em>
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
                        <h3>{{ $post->title }}</h3>
                    </a>
                    <p>
                        {{ $post->content }}
                        <em>-
                            @if($reminder->user)
                                @if($reminder->user->totem)
                                    {{ $reminder->user->totem }}
                                @else
                                    {{ $reminder->user->firstname }} {{ $reminder->user->lastname }}
                                @endif
                            @endif
                        </em>
                    </p>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <a href="{{ url('/photos') }}">
            <h2>Photos</h2>
        </a>
        <ul class="list-unstyled list-inline">
            @foreach($photographies as $photography)
                <li>
                    <a href="{{ url('/photos') }}">
                        <img src="/th14/public/{{ $photography->image_path . 'thumbnails/thumb-'. $photography->image_name . '.' . $photography->image_extension }}">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
