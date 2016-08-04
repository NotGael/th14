@include('errors.errors')

<?php
    if($photography->id)
    {
        $options = ['method' => 'put', 'url' => action('Admin\PhotographiesController@update', $photography), 'class' => 'form', 'files' => true];
    }
    else
    {
        $options = ['method' => 'post', 'url' => action('Admin\PhotographiesController@store', $photography), 'class' => 'form', 'files' => true];
    }
?>

{!! Form::model($photography, $options) !!}
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
    </div>
    @if(!$photography->id)
        <div class="form-group">
            <label>
                {!! Form::checkbox('online') !!}
                En ligne ?
            </label>
        </div>
    @endif
    @if(!$photography->id)
        <div class="form-group">
            {!! Form::label('image name', 'Nom') !!}
            {!! Form::text('image_name', null, ['class' => 'form-control']) !!}
        </div>
    @else
        <div class="form-group">
            <a href="{{route('admin.photos.show', $photography)}}">
                <img src="/th14/public{{ $photography->image_path.'/thumbnails/thumb-'.$photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
            </a>
            <p>
                <b>Nom : {{ $photography->image_name }}</b>
            </p>
        </div>
    @endif
    <button class="btn btn-primary">Envoyer</button>
{!! Form::close() !!}
