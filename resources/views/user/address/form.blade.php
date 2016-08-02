<?php
  if($address->id) {
    $options = ['method' => 'put', 'url' => action('User\AddressController@update', $address)];
  } else {
    $options = ['method' => 'post', 'url' => action('User\AddressController@store', $address)];
  }
?>
@include('errors.errors')
@include('flash')

{!! Form::model($address, $options) !!}

    <div class="form-group">
        {!! Form::label('street', 'Rue') !!}
        {!! Form::text('street', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('number', 'Numéro') !!}
        {!! Form::text('number', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('postalcode', 'Code postale') !!}
        {!! Form::text('postalcode', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'Ville') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-primary">Envoyer</button>

{!! Form::close() !!}
