<?php
$asUser = false;
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Sections</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Nom </th>
                    <th>Contenu</th>
                    <th>Image</th>
                    <th>Responsable</th>
                    <th>Éditer</th>
                    <th>Supprimer</th>
                </tr>
                @foreach($sections as $section)
                    <tr>
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
                                @if($section->user->totem)
                                    <p>{{ $section->user->totem }}</p>
                                @else
                                    <p>{{ $section->user->firstname }} {{ $section->user->lastname }}</p>
                                @endif
                            @endif
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.sections.edit', $section)}}">Éditer</a></p>
                        </td>
                        <td>
                            {!! Form::model($section, ['route' => ['admin.sections.destroy', $section->id], 'method' => 'DELETE'])!!}
                                <div class="form-group">

                                    {!! Form::submit('X', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
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
