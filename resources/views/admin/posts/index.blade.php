@extends('layouts.admin')

@section('content')

    <h1 class="text-center">Index Post</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->photo->file}}</td>
                    <td>{{$post->category != '' ? $post->category->name : "Uncategorized"}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection