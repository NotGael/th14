@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Photos</h1>
            @if(isset($photographies))
                <ul class="list-unstyled list-inline">
                    @foreach($photographies as $photography)
                        <li>
                            <a href="{{ url('/photos') }}">
                                <img src="/th14/public/{{ $photography->image_path . 'thumbnails/thumb-'. $photography->image_name . '.' . $photography->image_extension }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
