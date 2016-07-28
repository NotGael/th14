@extends('layouts.app')

@section('content')
    <!-- Table -->
    <table class="table">
        <tr>
            <th>Id </th>
            <th>Titre </th>
            <th>Slug </th>
            <th>Contenu </th>
            <th>Auteur </th>
            <th>Section </th>
            <th>Editer </th>
            <th>Supprimer </th>
            <th>Publier </th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>
                    <p>{{ $post->id }}</p>
                </td>
                <td>
                    <p><b>{{ $post->title }}</b><p>
                </td>
                <td>
                    <p>{{ $post->slug }}</p>
                </td>
                <td>
                    <p>{{ $post->content }}</p>
                </td>
                <td>
                    @if($post->user)
                        <p>{{ $post->user->totem }}</p>
                    @endif
                </td>
                <td>
                    @if($post->section)
                        <p>{{ $post->section->name }}</p>
                    @endif
                </td>
                <td>
                    <p><a class="btn btn-primary" href="{{route('admin.articles.edit', $post)}}">Editer</a></p>
                </td>
                <td>
                    {!! Form::model($post, ['route' => ['admin.articles.destroy', $post->id], 'method' => 'DELETE'])!!}
                        <div class="form-group">

                            {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
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
    <p><a class="btn btn-primary" href="{{route('admin.articles.create')}}">Créer un nouvel article</a></p>
@endsection