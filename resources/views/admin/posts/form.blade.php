@include('errors.errors')

<?php
  if($post->id)
  {
    $options = ['method' => 'put', 'url' => action('Admin\PostsController@update', $post)];
  }
  else
  {
    $options = ['method' => 'post', 'url' => action('Admin\PostsController@store', $post)];
  }
?>

{!! Form::model($post, $options) !!}
    <div class="form-group">
        {!! Form::label('title', 'Titre') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    @if(!$post->id)
        <div class="form-group">
            {!! Form::label('slug', 'URL') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('section_id', 'Section') !!}
        {!! Form::select('section_id', $sections, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Contenu') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    @if(!$post->id)
        <div class="form-group">
            <label>
                    {!! Form::checkbox('online') !!}
                    En ligne ?
            </label>
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('published_at', 'Définir une date de publication') !!}
        {!! Form::date('published_at', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}
    </div>
    <button class="btn btn-primary">Envoyer</button>
{!! Form::close() !!}
