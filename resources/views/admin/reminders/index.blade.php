@extends('layouts.app')

@include('flash')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Rappels</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Contenu</th>
                    <th>Section</th>
                    <th>Auteur</th>
                    <th>Éditer</th>
                    <th>Supprimer</th>
                </tr>
                @foreach($reminders as $reminder)
                    <tr>
                        <td>
                            <b>{{ $reminder->content }}</b>
                        </td>
                        <td>
                            @if($reminder->section)
                                <p>{{ $reminder->section->name }}</p>
                            @endif
                        </td>
                        <td>
                            @if($reminder->user)
                                @if($reminder->user->totem)
                                    <p>{{ $reminder->user->totem }}</p>
                                @else
                                    <p>{{ $reminder->user->firstname }} {{ $reminder->user->lastname }}</p>
                                @endif
                            @endif
                        </td>
                        <td>
                            <p>
                                <a class="btn btn-primary" href="{{route('admin.rappels.edit', $reminder)}}">O</a>
                            </p>
                        </td>
                        <td>
                            {!! Form::model($reminder, ['route' => ['admin.rappels.destroy', $reminder->id], 'method' => 'DELETE'])!!}
                                <div class="form-group">
                                    {!! Form::submit('X', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="panel-body">
                <p>
                    <a class="btn btn-success" href="{{route('admin.rappels.create')}}">Nouveau rappel</a>
                </p>
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
