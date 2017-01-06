@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        {{--<div class="col-sm-6">
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
        </div>--}}

        <div class="col-sm-6">
            @if($comments)
                @foreach($comments as $comment)
                    <tr>

                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td><a href="{{route('home.post', $comment->post->id)}}">{{$comment->body}}</a></td>
                        <td>{{$comment->created_at->diffForHumans()}}</td>
                        <td>{{$comment->updated_at->diffForHumans()}}</td>
                        <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>

                        <td>
                            @if($comment->is_active == 1)
                                {!! Form::Model($comment, array('action' => ['PostsCommentsController@update', $comment->id], 'method' => 'patch')) !!}
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-group">

                                    {{Form::submit('Un-Approve', array('class' => 'btn btn-success'))}}
                                </div>

                                {!! Form::close() !!}

                            @elseif($comment->is_active == 0)

                                {!! Form::Model($comment, array('action' => ['PostsCommentsController@update', $comment->id], 'method' => 'patch')) !!}
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">

                                    {{Form::submit('Approve', array('class' => 'btn btn-info'))}}

                                </div>
                                {!! Form::close() !!}
                                @endif
                        </td>

                        <td>
                            {!! Form::Model($comment, array('action' => ['PostsCommentsController@destroy', $comment->id], 'method' => 'delete')) !!}

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

@stop