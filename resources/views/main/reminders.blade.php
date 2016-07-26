@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Rappels</h1>
    </div>
    <div class="list-group">
      <ul>
    @foreach($reminders as $reminder)
      <li>
        <p> {{ $reminder->content }} </p>
        @if($reminder->user)
            <p><em>
                {{ $reminder->user->name }}
                @if($reminder->section)
                    {{ $reminder->section->name }}
                @endif
            </em></p>
        @endif
      </li>
    @endforeach
    </ul>
    </div>
</div>
@endsection
