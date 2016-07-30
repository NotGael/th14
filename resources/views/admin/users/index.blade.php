@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Utilisateurs</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Grade</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Totem</th>
                    <th>Section</th>
                    <th>Email</th>
                    <th>Nom de l'image</th>
                    <th>Path de l'image</th>
                    <th>Extension de l'image</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                    <th>Valider</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <p>{{ $user->id }}</p>
                        </td>
                        <td>
                            <p><b>{{ $user->grade }}</b><p>
                        </td>
                        <td>
                            <p>{{ $user->firstname }}</p>
                        </td>
                        <td>
                            <p>{{ $user->lastname }}</p>
                        </td>
                        <td>
                            <p>{{ $user->totem }}</p>
                        </td>
                        <td>
                            @if($user->section)
                                <p>{{ $user->section->name }}</p>
                            @endif
                        </td>
                        <td>
                            <p>{{ $user->email }}</p>
                        </td>
                        <td>
                            <p>{{ $user->image_name }}</p>
                        </td>
                        <td>
                            <p>{{ $user->image_path }}</p>
                        </td>
                        <td>
                            <p>{{ $user->image_extension }}</p>
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editer</a></p>
                        </td>
                        <td>
                            {!! Form::model($user, ['route' => ['admin.users.destroy', $user->id], 'method' => 'DELETE'])!!}
                                <div class="form-group">

                                    {!! Form::submit('X', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::model($user, ['method' => 'put', 'url' => action('Admin\PostsController@update', $user)]) !!}
                                <div class="form-group">
                                    @if($user->grade == 0)
                                        {!! Form::hidden('grade', 'A') !!}
                                        {!! Form::submit('Autoriser', array('class'=>'btn btn-success')) !!}
                                    @else($user->grade == 1)
                                        {!! Form::submit('Autoriser', array('class'=>'btn btn-success',  'disabled' => 'disabled')) !!}
                                    @endif
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
       function ConfirmDelete()
       {
           var x = confirm("Are you sure you want to delete?");
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
