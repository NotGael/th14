<?php
if($section->id) {
    $options = ['method' => 'put', 'url' => action('SectionsController@update', $section)];
} else {
    $options = ['method' => 'post', 'url' => action('SectionsController@store', $section)];
}
?>

@include('errors.errors')
@include('flash')

{!! Form::model($section, $options) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-primary">Envoyer</button>

{!! Form::close() !!}
