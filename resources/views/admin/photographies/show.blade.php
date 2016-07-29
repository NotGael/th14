@extends('layouts.app')


@section('content')

    <div>

        {{ $photography->image_name }} :  <br>

        <img src="/th14/public/imgs/photographies/{{ $photography->image_name . '.' .
            $photography->image_extension . '?'. 'time='. time() }}">

        </div>

    <div>

        {{ $photography->image_name }} - thumbnail :  <br>

        <img src="/th14/public/imgs/photographies/thumbnails/{{ 'thumb-' . $photography->image_name . '.' .
            $photography->image_extension . '?'. 'time='. time() }}">

    </div>

@endsection
