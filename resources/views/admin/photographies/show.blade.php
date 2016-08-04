@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <p>Nom de l'image : {{ $photography->image_name }}</p>
            <a href="{{route('admin.photos.show', $photography)}}">
                <img src="/th14/public{{ $photography->image_path.$photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
            </a>
        </div>
        <div class="row">
            <p>Miniature </p>
            <img src="/th14/public{{ $photography->image_path.'/thumbnails/thumb-'.$photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
        </div>
    </div>
@endsection
