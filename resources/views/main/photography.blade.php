@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(isset($photography))
                <img src="/th14/public{{ $photography->image_path.$photography->image_name . '.' . $photography->image_extension }}">
                <p>
                    <b>
                        Auteur :
                        @if($photography->user)
                            @if($photography->user->totem)
                                {{ $photography->user->totem }}
                            @else
                                {{ $photography->user->firstname }} {{ $photography->user->lastname }}
                            @endif
                        @endif
                    </b>
                </p>
            @else
                <h3 class="text-center">Aucune image n'a été trouvée</h3>
            @endif
        </div>
    </div>
@endsection
