@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rappels</h1>
    <div class="list-group">

    @foreach($reminders as $reminder)

        <a href="{{route('admin.reminders.edit', $reminder)}}" class="list-group-item">
            {{ $reminder->content }}
        </a>

    @endforeach

    </div>
</div>
@endsection
