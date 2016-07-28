@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sections</h1>
        <table class="table">
            <tr>
                <th>Id </th>
                <th>Nom </th>
                <th>Contenu</th>
                <th>Nom de l'image</th>
                <th>Path de l'image</th>
                <th>Extension de l'image</th>
                <th>Animateur responsable</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
            @foreach($sections as $section)
                <tr>
                    <td>
                        <p>{{ $section->id }}</p>
                    </td>
                    <td>
                        <p>{{ $section->name }}</p>
                    </td>
                    <td>
                        <p>{{ $section->content }}</p>
                    </td>
                    <td>
                        <p>{{ $section->image_name }}</p>
                    </td>
                    <td>
                        <p>{{ $section->image_path }}</p>
                    </td>
                    <td>
                        <p>{{ $section->image_extension }}</p>
                    </td>
                    <td>
                        @if($section->user)
                            <p>{{ $section->user->totem }}</p>
                        @endif
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach
        </table>
        <p><a class="btn btn-primary" href="{{route('admin.sections.create')}}">Créer une nouvelle section</a></p>
    </div>

@endsection
