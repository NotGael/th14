@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Th14</h1>
    </div>
    <div class="row">
        <h2>Rappels</h2>
        <ul>
      @foreach($reminders as $reminder)
        <li>
          <a href="{{ url('/rappels') }}">{{ $reminder->content }}</a>
          @if($reminder->user)
              <p><em>
                  {{ $reminder->user->totem }}
                  @if($reminder->section)
                      {{ $reminder->section->totem }}
                  @endif
              </em></p>
          @endif
        </li>
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
            @if($post)
                <a href="{{ url('/articles') }}"><h3>
                    {{ $post->title }}
                </h3></a>
                <p> {{ $post->content }} </p>
                @if($post->user)
                    <p><em> {{ $post->user->totem }}
                        @if($post->section)
                            {{ $post->section->totem }}
                        @endif
                    </em></p>
                @endif
            @endif
        </div>
    </div>

    <div class="row">
        <h2>Photos</h2>
        <ul>
        @foreach($photographies as $photography )
            <li><a href="{{ url('/photos') }}">
              <img src="/th14/public/imgs/photographies/thumbnails/{{ 'thumb-'. $photography->image_name . '.' .
                  $photography->image_extension }}">
            </a></li>
        @endforeach
        </ul>
    </div>

</div>
@endsection
