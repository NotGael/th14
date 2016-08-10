@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Calendrier</h1>
            @if(isset($events))
                @foreach($events as $event)
                    <div class="col-md-3">
                        @if($event->section)
                            @if($event->section->id == 1)
                                <div class="text-info">
                            @elseif($event->section->id == 2)
                                <div class="text-success">
                            @elseif($event->section->id == 3)
                                <div class="text-primary">
                            @elseif($event->section->id == 4)
                                <div class="text-danger">
                            @elseif($event->section->id == 5)
                                <div class="text-warning">
                            @endif
                            <h3>{{ $event->name }}</h3>
                            @if($event->section)
                                <p>Section : {{ $event->section->name }}</p>
                            @endif
                            <p>{{ $event->content }}</p>
                            <p>
                                <b>Début : </b>
                                {{ $event->start }}
                            </p>
                            <p>
                                <b>Fin : </b>
                                {{ $event->end }}
                            </p></div>
                        @else
                            <h3>{{ $event->name }}</h3>
                            @if($event->section)
                                <p>Section : {{ $event->section->name }}</p>
                            @endif
                            <p>{{ $event->content }}</p>
                            <p>
                                <b>Début : </b>
                                {{ $event->start }}
                            </p>
                            <p>
                                <b>Fin : </b>
                                {{ $event->end }}
                            </p>
                        @endif
                    </div>
                @endforeach
                {{ $events->links() }}
            @endif
        </div>
    </div>
@endsection
