@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Photos</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Auteur</th>
                    <th>Type</th>
                    <th>Editer </th>
                    <th>Supprimer</th>
                    <th>Publier</th>
                </tr>
                @foreach($photographies as $photography )
                    <tr>
                        <td>
                            <p>{{ $photography->id }}</p>
                        </td>
                        <td>
                            <b>{{ $photography->image_name }}</b>
                        </td>
                        <td>
                            <a href="{{route('admin.photos.show', $photography)}}">
                                <img src="/th14/public/{{ $photography->image_path . 'thumbnails/thumb-'. $photography->image_name . '.' . $photography->image_extension }}">
                            </a>
                        </td>
                        <td>
                            @if($photography->user)
                                @if($photography->user->totem)
                                    {{ $photography->user->totem }}
                                @else
                                    {{ $photography->user->firstname }} {{ $photography->user->lastname }}
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($photography->image_path == '/imgs/photographies/')
                                <p>photo</p>
                            @elseif($photography->image_path == '/imgs/users/')
                                <p>utilisateur</p>
                            @elseif($photography->image_path == '/imgs/sections/')
                                <p>section</p>
                            @endif
                        </td>
                        <td>
                            <p>
                                <a class="btn btn-primary" href="{{route('admin.photos.edit', $photography)}}">O</a>
                            </p>
                        </td>
                        <td>
                            {!! Form::model($photography, ['route' => ['admin.photos.destroy', $photography->id], 'method' => 'DELETE'])!!}
                            <div class="form-group">
                                {!! Form::submit('X', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::model($photography, ['method' => 'put', 'url' => action('Admin\PhotographiesController@update', $photography)]) !!}
                                <div class="form-group">
                                    @if($photography->online)
                                        {!! Form::hidden('online', '0') !!}
                                        {!! Form::submit('Cacher', array('class'=>'btn btn-warning')) !!}
                                    @else
                                        {!! Form::hidden('online', '1') !!}
                                        {!! Form::submit('Publier', array('class'=>'btn btn-success')) !!}
                                    @endif
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="panel-body">
                <p>
                    <a class="btn btn-success" href="{{route('admin.photos.create')}}">Nouvelle photo</a>
                </p>
            </div>
        </div>
    </div>
    <script>
       function ConfirmDelete()
       {
           var x = confirm("Êtes-vous sûr de vouloir supprimer ?");
           if(x)
           {
               return true;
           }
           else
           {
               return false;
           }
       }
    </script>
@endsection
