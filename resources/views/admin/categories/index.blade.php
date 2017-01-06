@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Index Category</h1>
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
            {!! Form::open(array('action' => 'AdminCategoriesController@store', 'method' => 'post')) !!}

                <div class="form-group">

                    {{Form::label('name', 'Name')}}

                    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}

                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        @if(isset($errors))
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-8">
                        {{Form::submit('Create Category', array('class' => 'btn btn-primary'))}}
                    </div>
                </div>

                {!! Form::close() !!}
        </div>

            <div class="col-sm-6">
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>

                    </tr>
                @endforeach
            @endif
        </div>
        </tbody>
    </table>
@endsection