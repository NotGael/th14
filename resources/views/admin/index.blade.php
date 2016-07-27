@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="list-group">
            <h1>Fonctionnalité implémentée</h1>
            <h2>Reminders</h2>
            <a href="{{route('admin.reminders.create')}}" class="list-group-item">Création de rappels</a>
            <a href="{{route('admin.reminders.index')}}" class="list-group-item">Liste des rappels</a>
            <h2>Sections</h2>
            <a href="{{route('admin.sections.create')}}" class="list-group-item">Création de sections</a>
            <a href="{{route('admin.sections.index')}}" class="list-group-item">Liste des sections</a>
            <h2>Photos</h2>
            <a href="{{route('admin.photographies.create')}}" class="list-group-item">Upload de photos</a>
            <a href="{{route('admin.photographies.index')}}" class="list-group-item">Liste des photos</a>
            <h2>News</h2>
            <a href="{{route('admin.news.create')}}" class="list-group-item">Création d'articles</a>
            <a href="{{route('admin.news.index')}}" class="list-group-item">Liste des articles</a>
        </div>
    </div>
</div>
@endsection
