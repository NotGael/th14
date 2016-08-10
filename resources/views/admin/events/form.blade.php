@include('errors.errors')

<?php
  if($event->id)
  {
    $options = ['method' => 'put', 'url' => action('Admin\EventsController@update', $event)];
  }
  else
  {
    $options = ['method' => 'post', 'url' => action('Admin\EventsController@store', $event)];
  }
?>

{!! Form::model($event, $options) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('slug', 'URL') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Contenu') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('section_id', 'Section') !!}
        {!! Form::select('section_id', $sections, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('start', 'Définir une date de début') !!}
        {!! Form::date('start', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('end', 'Définir une date de fin') !!}
        {!! Form::date('end', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}
    </div>
    <button class="btn btn-success">Envoyer</button>
{!! Form::close() !!}
