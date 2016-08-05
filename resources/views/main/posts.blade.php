@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>Articles</h2>
        @if(isset($posts))
            @foreach($posts as $post)
                <div class="col-md-6">
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
@endsection
