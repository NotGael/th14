@extends('layouts.app')

@section('content')

    <h1>Liste de tous les rappels</h1>
    <div class="list-group">

    @foreach($reminders as $reminder)

        <a href="{{route('reminders.edit', $reminder)}}" class="list-group-item">
            {{ $reminder->content }}
        </a>

    @endforeach

    </div>

@endsection
