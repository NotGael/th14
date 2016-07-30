@extends('layouts.app')


@section('content')

    <div>

        {{ $photography->image_name }} :  <br>

        @if($photography->image_type == 1)
            <a href="{{route('admin.photos.show', $photography)}}">
                <img src="/th14/public/imgs/photographies/{{ $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
            </a>
        @elseif($photography->image_type == 2)
            <a href="{{route('admin.photos.show', $photography)}}">
                <img src="/th14/public/imgs/sections/{{ $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
            </a>
        @endif
    </div>
    <div>

        {{ $photography->image_name }} - thumbnail :  <br>

        @if($photography->image_type == 1)
            <a href="{{route('admin.photos.show', $photography)}}">
                <img src="/th14/public/imgs/photographies/thumbnails/{{ 'thumb-'. $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
            </a>
        @elseif($photography->image_type == 2)
            <a href="{{route('admin.photos.show', $photography)}}">
                <img src="/th14/public/imgs/sections/thumbnails/{{ 'thumb-'. $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
            </a>
        @endif

    </div>

@endsection
