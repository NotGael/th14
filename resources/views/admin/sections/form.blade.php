<?php
if($section->id) {
    $options = ['method' => 'put', 'url' => action('Admin\SectionsController@update', $section)];
} else {
    $options = ['method' => 'post', 'url' => action('Admin\SectionsController@store', $section)];
}
$asUser = false;
?>

@include('errors.errors')
@include('flash')

{!! Form::model($section, $options) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Info') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('user_id', 'Animateur responsable') !!}
      {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
    </div>
    @if(!$section->photography)
        <div class="form-group">
            {!! Form::label('image name', 'Nom de l\'image') !!}
            {!! Form::text('image_name', null, ['class' => 'form-control']) !!}
        </div>
    @else
        <div class="row">
        <img src="/th14/public/imgs/photographies/{{ $section->photography->image_name . '.' .
            $section->photography->image_extension . '?'. 'time='. time() }}">
        <br>
        <b>Nom : {{ $section->photography->image_name }}</b>
        </div>
    @endif
    <div class="form-group">
        <label>
            @if($section->photography)
                {!! Form::checkbox('online', $section->photography->online) !!}
                En ligne ?
            @else
                {!! Form::checkbox('online') !!}
                En ligne ?
            @endif
        </label>
        <div class="form-group">
           {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
        </div>
    </div>


{!! Form::close() !!}

@if(isset($users_section))
    <h2>Liste des animateur/animé section<h2>
    <ul  class="list-group">
        @foreach($users_section as $user_section)
            <li class="list-group-item">
              <p>
                {{{ $user_section->firstname }}},
                {{{ $user_section->lastname }}},
                {{{ $user_section->totem }}},
              </p>
            </li>
            <?php $asUser = true; ?>
        @endforeach
        @if (!$asUser)
          <li class="list-group-item">
              Section vide
          </li>
        @endif
    </ul>


{!! Form::model($section, $options) !!}

    <div class="form-group">
        {!! Form::label('user_id', 'Ajouter un utilisateur à la section') !!}
          {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
    </div>

{!! Form::close() !!}

@endif
