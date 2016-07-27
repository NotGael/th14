@extends('layouts.app')

@section('content')

    <h1>Liste de toutes les sections</h1>
    <div class="list-group">

    @foreach($sections as $section)

            <a href="{{route('admin.sections.edit', $section)}}" class="list-group-item">
                <h2 class="list-group-item-heading">
                    {{ $section->name }}
                </h2>
            </a>

    @endforeach

    </div>

@endsection
