@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Index Media</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        <div class="col-sm-6">
            @if($photos)
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><a href="{{route('admin.media.edit', $photo->id)}}"><img height="50px" src="{{$photo->file}}"/></a></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>
                        <td>{{$photo->updated_at->diffForHumans()}}</td>
                        <td>
                            {!! Form::open(array('action' => ['MediaController@destroy', $photo->id], 'method' => 'delete')) !!}

                                <div class="form-group">
                                    {{Form::submit('Delete', array('class' => 'btn btn-danger'))}}
                                </div>

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
        </div>
        </tbody>
    </table>
@endsection