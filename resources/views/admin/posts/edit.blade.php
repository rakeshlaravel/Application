@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Edit Post</h1>
    {!! Form::Model($post, array('action' => ['AdminPostsController@update', $post->id], 'method' => 'patch')) !!}
    <div class="row">
        <div class="form-group">

            {{Form::label('title', 'Title')}}

            {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter Title')) }}

        </div>

        <div class="form-group">

            {{Form::label('category_id', 'Role')}}

            {{ Form::select('category_id', $category, 'administrator', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">

            {{Form::label('body', 'Body')}}

            {{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Enter Body', 'rows'=>3)) }}

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
                {{Form::submit('Edit Post', array('class' => 'btn btn-primary'))}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection