@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Sections</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Id </th>
                    <th>Nom </th>
                    <th>Contenu</th>
                    <th>Image</th>
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
                            @if($section->photography)
                                <a href="{{route('admin.photos.show', $section->photography)}}">
                                    <img src="/th14/public/imgs/sections/thumbnails/{{ 'thumb-'. $section->photography->image_name . '.' . $section->photography->image_extension . '?'. 'time='. time() }}">
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($section->user)
                                <p>{{ $section->user->totem }}</p>
                            @endif
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.sections.edit', $section)}}">Editer</a></p>
                        </td>
                        <td>
                            {!! Form::model($section, ['route' => ['admin.sections.destroy', $section->id], 'method' => 'DELETE'])!!}
                                <div class="form-group">

                                    {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="panel-body">
                <p><a class="btn btn-success" href="{{route('admin.sections.create')}}">Nouvelle section</a></p>
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
