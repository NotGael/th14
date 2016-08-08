@extends('layouts.app')

@include('flash')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Articles</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Titre</th>
                    <th>URL</th>
                    <th>Contenu</th>
                    <th>Section</th>
                    <th>Auteur</th>
                    <th>Éditer</th>
                    <th>Supprimer</th>
                    <th>Publier</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <p>
                                <b>{{ $post->title }}</b>
                            <p>
                        </td>
                        <td>
                            <p>{{ $post->slug }}</p>
                        </td>
                        <td>
                            <p>{{ $post->content }}</p>
                        </td>
                        <td>
                            @if($post->section)
                                <p>{{ $post->section->name }}</p>
                            @endif
                        </td>
                        <td>
                            @if($post->user)
                                @if($post->user->totem)
                                    <p>{{ $post->user->totem }}</p>
                                @else
                                    <p>{{ $post->user->firstname }} {{ $post->user->lastname }}</p>
                                @endif
                            @endif
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.articles.edit', $post)}}">O</a></p>
                        </td>
                        <td>
                            {!! Form::model($post, ['route' => ['admin.articles.destroy', $post->id], 'method' => 'DELETE'])!!}
                                <div class="form-group">

                                    {!! Form::submit('X', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                          {!! Form::model($post, ['method' => 'put', 'url' => action('Admin\PostsController@update', $post)]) !!}
                              <div class="form-group">
                                  @if($post->online)
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
                <p><a class="btn btn-success" href="{{route('admin.articles.create')}}">Nouvel article</a></p>
            </div>
        </div>
    </div>
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
