@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
            <h1 class="text-center">Admin</h1>
            <a class="btn btn-primary btn-lg btn-block" href="{{route('admin.rappels.index')}}">Rappels</a>
            <a class="btn btn-primary btn-lg btn-block" href="{{route('admin.articles.index')}}">Articles</a>
            <a class="btn btn-primary btn-lg btn-block" href="{{route('admin.sections.index')}}">Sections</a>
            <a class="btn btn-primary btn-lg btn-block" href="{{route('admin.photos.index')}}">Photos</a>
            <a class="btn btn-primary btn-lg btn-block" href="{{route('admin.users.index')}}">Utilisateurs</a>
        </div>
        <div class="col-xs-6 col-md-4"></div>
    </div>
</div>
@endsection
