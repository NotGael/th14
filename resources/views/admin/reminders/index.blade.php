@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rappels</h1>
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
        <p><a class="btn btn-primary" href="{{route('admin.rappels.create')}}">Créer un nouveau rappel</a></p>
    </div>
@endsection
