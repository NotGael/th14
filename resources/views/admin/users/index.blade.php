@extends('layouts.app')

@include('flash')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Utilisateurs</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Grade</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Totem</th>
                    <th>Section</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Editer</th>
                    <th>Valider</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <p>
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
                            @if($user->photography)
                                <a href="{{route('admin.photos.show', $user->photography)}}">
                                    <img src="/th14/public{{ $user->photography->image_path.'/thumbnails/thumb-'.$user->photography->image_name . '.' . $user->photography->image_extension . '?'. 'time='. time() }}">
                                </a>
                            @endif
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">O</a></p>
                        </td>
                        <td>
                            {!! Form::model($user, ['method' => 'put', 'url' => action('Admin\PostsController@update', $user)]) !!}
                                <div class="form-group">
                                    @if(Auth::user()->grade >= 2)
                                        @if($user->grade == 0)
                                            {!! Form::hidden('grade', 1) !!}
                                            {!! Form::submit('Autoriser', array('class'=>'btn btn-success')) !!}
                                        @endif
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
