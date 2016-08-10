@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Rappels</h1>
            @if(isset($reminders))
                <div class="list-group">
                    <ul class="list-unstyled">
                        @foreach($reminders as $reminder)
                            <li>
                                @if($reminder->section)
                                    @if($reminder->section->id == 1)
                                        <p class="text-info">
                                    @elseif($reminder->section->id == 2)
                                        <p class="text-success">
                                    @elseif($reminder->section->id == 3)
                                        <p class="text-primary">
                                    @elseif($reminder->section->id == 4)
                                        <p class="text-danger">
                                    @elseif($reminder->section->id == 5)
                                        <p class="text-warning">
                                    @endif
                                    {{ $reminder->content }}
                                    <em>-
                                        @if($reminder->user)
                                            @if($reminder->user->totem)
                                                {{ $reminder->user->totem }}
                                            @else
                                                {{ $reminder->user->firstname }} {{ $reminder->user->lastname }}
                                            @endif
                                        @endif
                                    </em></p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
