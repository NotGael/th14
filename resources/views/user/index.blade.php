@extends('layouts.app')

@include('flash')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-4"></div>
        <div class="col-xs-6 col-md-4">
            <h1 class="text-center">Mon profil</h1>
            <h3>Infos</h3>
            <p>Grade :
                @if($user->grade == 0)
                    non validé
                @elseif($user->grade == 1)
                    Animé / Parent
                @elseif($user->grade == 2)
                    Animateur
                @elseif($user->grade == 3)
                    Admin
                @elseif($user->grade == 4)
                    Master
                @endif
            </p>
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
                <p>Code postal : {{ $user->address->postalcode }}</p>
                <p>Ville : {{ $user->address->city }}</p>
            @endif
            @if($user->photography)
                <h3>Image</h3>
                <p>
                    Image visible par les autres utilisateurs :
                    @if($user->photography->online)
                        Oui
                    @else
                        Non
                    @endif
                </p>
                <img src="/th14/public/imgs/users/{{ $user->photography->image_name . '.' . $user->photography->image_extension . '?'. 'time='. time() }}">
            @endif
            <a class="btn btn-primary btn-lg btn-block" href="{{url('user/address/'.Auth::user()->address_id.'/edit')}}">Changer mon adresse</a>
            @if($user->photography)
                <a class="btn btn-primary btn-lg btn-block" href="{{url('user/photography/'.Auth::user()->photography->id.'/edit')}}">Changer ma photo</a>
            @else
                <a class="btn btn-primary btn-lg btn-block" href="{{url('user/photography/create')}}">Ajouter une photo a mon profil</a>
            @endif
        </div>
        <div class="col-xs-6 col-md-4"></div>
    </div>
</div>
@endsection
