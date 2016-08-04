@include('errors.errors')

<?php
  if($photography->id)
  {
    $options = ['method' => 'put', 'url' => action('User\PhotographyController@update', $photography), 'class' => 'form', 'files' => true];
  }
  else
  {
    $options = ['method' => 'post', 'url' => action('User\PhotographyController@store', $photography), 'class' => 'form', 'files' => true];
  }
?>

{!! Form::model($photography, $options) !!}
    <div class="form-group">
        {!! Form::label('imageUser', 'Image') !!}
        {!! Form::file('imageUser', null, array('required', 'class'=>'form-control')) !!}
    </div>
    @if(!$photography->id)
        <div class="form-group">
            <label>
                {!! Form::checkbox('online') !!}
                En ligne ?
            </label>
        </div>
    @endif
    @if($photography->id)
        <div class="row">
            <img src="/th14/public/imgs/users/{{ $photography->image_name . '.' .
            $photography->image_extension . '?'. 'time='. time() }}">
            <p>Nom : {{ $photography->image_name }}</p>
        </div>
    @endif
    <button class="btn btn-primary">Envoyer</button>
{!! Form::close() !!}
