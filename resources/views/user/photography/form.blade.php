
<?php
  if($photography->id) {
    $options = ['method' => 'put', 'url' => action('User\PhotographyController@update', $photography), 'class' => 'form', 'files' => true];
  } else {
    $options = ['method' => 'post', 'url' => action('User\PhotographyController@store', $photography), 'class' => 'form', 'files' => true];
  }
?>

@include('errors.errors')
@include('flash')

{!! Form::model($photography, $options) !!}
    <div class="form-group">
        {!! Form::label('imageUser', 'Image') !!}
        {!! Form::file('imageUser', null, array('required', 'class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        <label>
            @if(!$photography->id)
                {!! Form::checkbox('online') !!}
                En ligne ?
            @endif
        </label>
    </div>
    @if($photography->id)
        <div class="row">
        <img src="/th14/public/imgs/users/{{ $photography->image_name . '.' .
            $photography->image_extension . '?'. 'time='. time() }}">
        <br>
        <b>Nom : {{ $photography->image_name }}</b>

        </div>
    @endif
    <button class="btn btn-primary">Envoyer</button>

{!! Form::close() !!}
