<?php
  if($post->id) {
    $options = ['method' => 'put', 'url' => action('Admin\PostsController@update', $post)];
  } else {
    $options = ['method' => 'post', 'url' => action('Admin\PostsController@store', $post)];
  }
?>

@include('errors.errors')
@include('flash')

{!! Form::model($post, $options) !!}

    <div class="form-group">
        {!! Form::label('title', 'Titre') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'URL') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('section_id', 'Section') !!}
        {!! Form::select('section_id', $sections, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Contenu') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <label>
            @if($post->id)
                {!! Form::checkbox('online', $post->online) !!}
                En ligne ?
            @else
                {!! Form::checkbox('online') !!}
                En ligne ?
            @endif
        </label>
    </div>

    <button class="btn btn-primary">Envoyer</button>

{!! Form::close() !!}
