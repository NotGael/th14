@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nouvel article</h1>
        @include('admin.posts.form')
    </div>
@endsection
