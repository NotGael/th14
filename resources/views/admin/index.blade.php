@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="list-group">
            <h1>Fonctionnalité implémentée</h1>
            <h2>Rappels</h2>
            <a href="{{route('admin.rappels.create')}}" class="list-group-item">Création de rappels</a>
            <a href="{{route('admin.rappels.index')}}" class="list-group-item">Liste des rappels</a>
            <h2>Sections</h2>
            <a href="{{route('admin.sections.create')}}" class="list-group-item">Création de sections</a>
            <a href="{{route('admin.sections.index')}}" class="list-group-item">Liste des sections</a>
            <h2>Photos</h2>
            <a href="{{route('admin.photos.create')}}" class="list-group-item">Upload de photos</a>
            <a href="{{route('admin.photos.index')}}" class="list-group-item">Liste des photos</a>
            <h2>Articles</h2>
            <a href="{{route('admin.articles.create')}}" class="list-group-item">Création d'articles</a>
            <a href="{{route('admin.articles.index')}}" class="list-group-item">Liste des articles</a>
        </div>
    </div>
</div>
@endsection
