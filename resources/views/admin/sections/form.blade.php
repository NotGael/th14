<?php
if($section->id) {
    $options = ['method' => 'put', 'url' => action('Admin\SectionsController@update', $section), 'class' => 'form', 'files' => true];
} else {
    $options = ['method' => 'post', 'url' => action('Admin\SectionsController@store', $section), 'class' => 'form', 'files' => true];
}
$asUser = false;
$asImage = false;
?>

@include('errors.errors')
@include('flash')
<div class="container">
    <div class="row">

        {!! Form::model($section, $options) !!}
            @if(!$section->id)
                <div class="form-group">
                    {!! Form::label('name', 'Nom') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('content', 'Info') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('user_id', 'Animateur responsable') !!}
              {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
            </div>
            @if($section->id)
                @if($photography)
                    <div class="form-group">
                        <h3>Image</h3>
                        <a href="{{route('admin.photos.show', $photography)}}">
                            <img src="/th14/public/imgs/sections/{{ $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
                        </a><br>
                        <b>Nom de l'image</b><br>
                        <p>{{ $photography->image_name }}</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('online', $photography->online);
 !!}
                            En ligne ?
                            {{ $photography->online }}
                        </label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('imageSection', 'Changer l\'image') !!}
                        {!! Form::file('imageSection', null, array('class'=>'form-control')) !!}
                        <?php $asImage = true; ?>
                    </div>
                @endif
            @endif
            @if(!$asImage)
                {!! Form::checkbox('online') !!}
                En ligne ?
                <div class="form-group">
                    {!! Form::label('imageSection', 'Image') !!}
                    {!! Form::file('imageSection', null, array('class'=>'form-control')) !!}
                </div>
            @endif
            {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
    <div class="row">
        @if(isset($users_section))
            <h2>Liste des animateur/animé section<h2>
            <ul  class="list-group">
                @foreach($users_section as $user_section)
                    <li class="list-group-item small">
                      <p>
                        {{{ $user_section->firstname }}}
                        {{{ $user_section->lastname }}}
                        @if($user_section->totem)
                        - {{{ $user_section->totem }}}
                        @endif
                      </p>
                    </li>
                    <?php $asUser = true; ?>
                @endforeach
                @if(!$asUser)
                  <li class="list-group-item">
                      Section vide
                  </li>
                @endif
            </ul>
        @endif
    </div>
    <div class="row">
        {!! Form::model($section, $options) !!}
            <h2>TODO</h2>
            <div class="form-group">
                {!! Form::label('user_id', 'Ajouter un utilisateur à la section') !!}
                  {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
    </div>
<div>
