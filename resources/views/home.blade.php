@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="list-group">
                        <a href="{{route('reminders.create')}}" class="list-group-item">Création de rappels</a>
                        <a href="{{route('reminders.index')}}" class="list-group-item">Liste des rappels</a>
                        <a href="{{route('sections.create')}}" class="list-group-item">Création de sections</a>
                        <a href="{{route('sections.index')}}" class="list-group-item">Liste des sections</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
