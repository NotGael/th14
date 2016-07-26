@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Articles</h1>
    </div>
    <div class="list-group">
        <ul>
            @foreach($posts as $post)
                <li>
                    <h2> {{ $post->title }} </h2>
                    <p> {{ $post->content }} </p>
                    @if($post->user)
                        <p><em>
                            {{ $post->user->name }}
                            @if($post->section)
                                {{ $post->section->name }}
                            @endif
                        </em></p>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
