@extends('layouts.app')

@include('errors.errors')

@section('content')
    <h1>Editer</h1>
    {!! Form::model($user, ['method' => 'put', 'url' => action('Admin\UsersController@update', $user)]) !!}
    <div class="form-group">
        {!! Form::label('title', 'ID : ') !!}
        {{$user->id}}
    </div>
    @if(Auth::user()->grade == 2)
        <div class="form-group">
            {!! Form::label('grade', 'Grade : ') !!}
            {!! Form::selectRange('grade', 0, 1) !!}
        </div>
    @elseif(Auth::user()->grade == 3)
        <div class="form-group">
            {!! Form::label('grade', 'Grade : ') !!}
            {!! Form::selectRange('grade', 0, 3) !!}
        </div>
    @elseif(Auth::user()->grade == 4)
        <div class="form-group">
            {!! Form::label('grade', 'Grade : ') !!}
            {!! Form::selectRange('grade', 0, 4) !!}
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('firstname', 'Prénom : ') !!}
        {{$user->firstname}}
    </div>
    <div class="form-group">
        {!! Form::label('lastname', 'Nom : ') !!}
        {{$user->lastname}}
    </div>
    <div class="form-group">
        {!! Form::label('totem', 'Totem') !!}
        {!! Form::text('totem', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email : ') !!}
        {{$user->email}}
    </div>
    <div class="form-group">
        {!! Form::label('section_id', 'Section') !!}
        {!! Form::select('section_id', $sections, null, ['class' => 'form-control']) !!}
    </div>
    <button class="btn btn-primary">Envoyer</button>
{!! Form::close() !!}
@endsection
