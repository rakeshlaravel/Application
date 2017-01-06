@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Edit Category</h1>

    <div class="col-sm-6">
            {!! Form::Model($categories, array('action' => ['AdminCategoriesController@update', $categories->id], 'method' => 'patch')) !!}

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
                    {{Form::submit('Edit Category', array('class' => 'btn btn-primary'))}}
                </div>
            </div>

            {!! Form::close() !!}
        </div>

@endsection