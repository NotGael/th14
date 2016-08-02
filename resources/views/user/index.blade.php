@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
            <h1 class="text-center">Mon profil</h1>
            <h3>Infos</h3>
            <p>Grade : {{ $user->grade }}</p>
            <p>Nom : {{ $user->firstname }} {{ $user->lastname }}</p>
            <p>Totem : {{ $user->totem }}</p>
            @if($user->section)
                <p>Section : {{ $user->section->name }}</p>
            @endif
            <p>Email : {{ $user->email }}</p>
            @if($user->address)
                <h3>Adresse</h3>
                <p>Rue : {{ $user->address->street }}</p>
                <p>Numéro : {{ $user->address->number }}</p>
                <p>Code postale : {{ $user->address->postalcode }}</p>
                <p>Ville : {{ $user->address->city }}</p>
            @endif
            <a class="btn btn-primary btn-lg btn-block" href="{{url('user/address/'.Auth::user()->address_id.'/edit')}}">Changer mon adresse</a>
        </div>
        <div class="col-xs-6 col-md-4"></div>
    </div>
</div>
@endsection
