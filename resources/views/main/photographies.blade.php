@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Photos</h1>
    </div>
    <div class="list-group">
    <ul>
    @foreach($photographies as $photography)

      <li>
          @if($photography->image_type == 1)
                  <img src="/th14/public/imgs/photographies/thumbnails/{{ 'thumb-'. $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
          @elseif($photography->image_type == 2)
                  <img src="/th14/public/imgs/sections/thumbnails/{{ 'thumb-'. $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
          @endif

            @if($photography->user)
                <p><em>
                    {{ $photography->user->totem }}
                    @if($photography->section)
                        {{ $photography->section->name }}
                    @endif
                </em></p>
            @endif
      </li>

    @endforeach
    </ul>
    </div>
</div>
@endsection
