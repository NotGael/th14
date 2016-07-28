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

            <h2>Photos</h2>
            <a href="{{route('admin.photos.create')}}" class="list-group-item">Upload de photos</a>
            <a href="{{route('admin.photos.index')}}" class="list-group-item">Liste des photos</a>
            <a href="{{route('admin.articles.index')}}" class="list-group-item">Liste des articles</a>

        </div>
        <div class="col-xs-6 col-md-4"></div>
    </div>
</div>
@endsection
