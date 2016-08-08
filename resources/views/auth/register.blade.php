@extends('layouts.app')

@include('errors.errors')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rejoignez TH14</div>
                <div class="panel-body">
                    {!! Form::model(['method' => 'post', 'url' => '/register']) !!}
                        <div class="form-group">
                            {!! Form::label('lastname', 'Nom') !!}
                            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('firstname', 'Prénom') !!}
                            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('totem', 'Totem') !!}
                            {!! Form::text('totem', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('section_id', 'Section') !!}
                            {!! Form::select('section_id', $sections, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Mot de passe') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirmer le mot de passe') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tel', 'Téléphone') !!}
                            {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                        </div>
                        <button class="btn btn-primary">S'inscrire</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
