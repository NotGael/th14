
<?php
  if($photography->id) {
    $options = ['method' => 'put', 'url' => action('Admin\PhotographiesController@update', $photography), 'class' => 'form', 'files' => true];
  } else {
    $options = ['method' => 'post', 'url' => action('Admin\PhotographiesController@store', $photography), 'class' => 'form', 'files' => true];
  }
?>

@include('errors.errors')
@include('flash')

{!! Form::model($photography, $options) !!}
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        <label>
            @if($photography->id)
                {!! Form::checkbox('online', $photography->online) !!}
                En ligne ?
            @else
                {!! Form::checkbox('online') !!}
                En ligne ?
            @endif
        </label>
    </div>
    @if(!$photography->id)
        <div class="form-group">
            {!! Form::label('image name', 'Nom') !!}
            {!! Form::text('image_name', null, ['class' => 'form-control']) !!}
        </div>
    @else
        <div class="row">
        <img src="/th14/public/imgs/photographies/{{ $photography->image_name . '.' .
            $photography->image_extension . '?'. 'time='. time() }}">
        <br>
        <b>Nom : {{ $photography->image_name }}</b>

        </div>
    @endif
    <button class="btn btn-primary">Envoyer</button>

{!! Form::close() !!}
