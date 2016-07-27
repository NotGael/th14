<?php
if($reminder->id) {
    $options = ['method' => 'put', 'url' => action('Admin\RemindersController@update', $reminder)];
} else {
    $options = ['method' => 'post', 'url' => action('Admin\RemindersController@store', $reminder)];
}
?>

@include('errors.errors')
@include('flash')

{!! Form::model($reminder, $options) !!}

    <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-primary">Envoyer</button>

{!! Form::close() !!}
