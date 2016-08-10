@extends('layouts.app')

@include('flash')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Événements</h1>
            </div>
            <table class="table">
                <tr>
                    <th>Nom </th>
                    <th>URL</th>
                    <th>Contenu</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                </tr>
                @foreach($events as $event)
                    <tr>
                        <td>
                            <p>{{ $event->name }}</p>
                        </td>
                        <td>
                            <p>{{ $event->slug }}</p>
                        </td>
                        <td>
                            <p>{{ $event->content }}</p>
                        </td>
                        <td>
                            <p>{{ $event->start }}</p>
                        </td>
                        <td>
                            <p>{{ $event->end }}</p>
                        </td>
                        <td>
                            <p><a class="btn btn-primary" href="{{route('admin.calendrier.edit', $event)}}">Éditer</a></p>
                        </td>
                        <td>
                            {!! Form::model($event, ['route' => ['admin.calendrier.destroy', $event->id], 'method' => 'DELETE'])!!}
                                <div class="form-group">

                                    {!! Form::submit('X', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="panel-body">
                <p><a class="btn btn-success" href="{{route('admin.calendrier.create')}}">Nouvel événement</a></p>
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
