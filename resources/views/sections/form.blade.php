<?php
if($section->id) {
    $options = ['method' => 'put', 'url' => action('SectionsController@update', $section)];
} else {
    $options = ['method' => 'post', 'url' => action('SectionsController@store', $section)];
}
$asUser = false;
?>

@include('errors.errors')
@include('flash')

{!! Form::model($section, $options) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('info', 'Info') !!}
        {!! Form::textarea('info', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('user_id', 'Animateur Responsable') !!}
      {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
    </div>
    <button class="btn btn-primary">Envoyer</button>

        @if(isset($users_section))
            <h2>Liste des animateur/animé section<h2>
            <ul  class="list-group">
                @foreach($users_section as $user_section)
                    <li class="list-group-item">
                        {{{ $user_section->name }}}
                    </li>
                    <?php $asUser = true; ?>
                @endforeach
                @if (!$asUser)
                  <li class="list-group-item">
                      Section vide
                  </li>
                @endif
            </ul>
        @endif

{!! Form::close() !!}
