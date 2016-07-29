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
                                <img src="/th14/public/imgs/photographies/thumbnails/{{ 'thumb-'. $photography->image_name . '.' . $photography->image_extension . '?'. 'time='. time() }}">
                            </a>
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.photos.edit', $photography)}}">Editer</a></p>
                        </td>
                        <td>
                            {!! Form::model($photography, ['route' => ['admin.photos.destroy', $photography->id], 'method' => 'DELETE'])!!}
                            <div class="form-group">
                                {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
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
                <p><a class="btn btn-success" href="{{route('admin.photos.create')}}">Nouvelle photo</a></p>
            </div>
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
