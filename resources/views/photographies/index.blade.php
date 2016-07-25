@extends('layouts.app')

@section('content')
    <br>

    <div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Liste des photos </div>
            <div class="panel-body">
            <a href="/th14/public/photographies/create">
                <button type="button" class="btn btn-lg btn-success">
                    Upload New</button></a>
            </div>

            <!-- Table -->
            <table class="table">
                <tr>
                    <th>Id </th>
                    <th>Name </th>
                    <th>Thumbnail </th>
                    <th>Edit </th>
                    <th>Delete </th>
                  </tr>
    @foreach($photographies as $photography )

                <tr>
                    <td>{{ $photography->id }}</td>
                    <td>{{ $photography->image_name }}</td>
                    <td><a href="/th14/public/photographies/{{ $photography->id  }}">
                        <img src="/th14/public/imgs/photographies/thumbnails/{{ 'thumb-'. $photography->image_name . '.' .
                            $photography->image_extension . '?'. 'time='. time() }}"></a></td>
                    <td> <a href="/th14/public/photographies/{{ $photography->id }}/edit">
                        <span class="glyphicon glyphicon-edit"
                            aria-hidden="true"></span></a></td>
                    <td>{!! Form::model($photography, ['route' => ['photographies.destroy', $photography->id],
                        'method' => 'DELETE'
                    ])!!}
                    <div class="form-group">

                        {!! Form::submit('Delete', array('class'=>'btn btn-danger', 'Onclick' => 'return ConfirmDelete();')) !!}

                    </div>
                        {!! Form::close() !!} </td>
                </tr>
    @endforeach
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

       function ConfirmDelete()
       {
           var x = confirm("Are you sure you want to delete?");
           if (x)
               return true;
           else
               return false;
       }

    </script>

@endsection
