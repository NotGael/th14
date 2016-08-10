@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nouvel événement</h1>
        @include('admin.events.form')
    </div>
@endsection
