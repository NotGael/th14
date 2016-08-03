@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nouveau rappel</h1>
        @include('admin.reminders.form')
    </div>
@endsection
