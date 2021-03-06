@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(isset($photographies))
                <h1>Photos</h1>
                <ul class="list-unstyled list-inline">
                    @foreach($photographies as $photography)
                        <li>
                            <a href="{{ url('/photo/'.$photography->id) }}">
                                <img src="/th14/public/{{ $photography->image_path . 'thumbnails/thumb-'. $photography->image_name . '.' . $photography->image_extension }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{ $photographies->links() }}
            @else
                <h3 class="text-center">Aucune image n'a été trouvée</h3>
                <p class="text-center">Vous devez êtres inscrit sur le site et être un utilisateur validé pour pouvoir visionner des photos</p>
                <p class="text-center">Veuillez vous inscrire si vous êtes scout ou parent</p>
                <p class="text-center">Attendez que votre compte soit validé par un admin</p>
            @endif
        </div>
    </div>
@endsection
