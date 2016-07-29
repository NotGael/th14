@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Rappels</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Auteur</th>
                    <th>Section</th>
                    <th>Contenu</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
                @foreach($reminders as $reminder)
                    <tr>
                        <td>
                            <p>{{ $reminder->id }}</p>
                        </td>
                        <td>
                            @if($reminder->user)
                                <p>{{ $reminder->user->totem }}</p>
                            @endif
                        </td>
                        <td>
                            @if($reminder->section)
                                <p>{{ $reminder->section->name }}</p>
                            @endif
                        </td>
                        <td>
                            <b>{{ $reminder->content }}</b>
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.rappels.edit', $reminder)}}">Editer</a></p>
                        </td>
                        <td>
                            {!! Form::model($reminder, ['route' => ['admin.rappels.destroy', $reminder->id], 'method' => 'DELETE'])!!}
                                <div class="form-group">

                                    {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach
            </table>
            <div class="panel-body">
                <p><a class="btn btn-success" href="{{route('admin.rappels.create')}}">Nouveau rappel</a></p>
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
