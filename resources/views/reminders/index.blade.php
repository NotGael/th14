@extends('layouts.app')

@section('content')

    @foreach($reminders as $reminder)

        <p>{{ $reminder->content }}</p>
        <p><a class="btn btn-primary" href="{{route('reminders.edit', $reminder)}}">Editer</a></p>

    @endforeach

@endsection
