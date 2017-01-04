@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    {!! Form::model($user, array('action' => ['AdminUsersController@update', $user->id], 'method' => 'patch', 'files' => true)) !!}
    <div class="row">

        <div class="col-sm-3">
            <img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400*400' }}" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            <div class="form-group">

                {{Form::label('name', 'Name')}}

                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}

            </div>

            <div class="form-group">

                {{Form::label('email', 'Email')}}

                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter Email')) }}

            </div>

            <div class="form-group">

                {{Form::label('photo_id', 'Image')}}

                {{ Form::file('photo_id', null, array('class' => 'form-control')) }}

            </div>

            <div class="form-group">

                {{Form::label('role_id', 'Role')}}

                {{ Form::select('role_id', $roles, null, array('class' => 'form-control')) }}

            </div>

            <div class="form-group">

                {{Form::label('is_active', 'Status')}}

                {{ Form::select('is_active', array('0'=>'Inactive', '1'=>'Active'), null,array('class' => 'form-control')) }}

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
                    {{Form::submit('Create User', array('class' => 'btn btn-primary'))}}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}


@stop