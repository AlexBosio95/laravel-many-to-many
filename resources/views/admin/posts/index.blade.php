@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('status'))
        <div class="alert alert-danger mt-3">
            {{ session('status') }}
        </div>
    @endif

    @if (session('create'))
        <div class="alert alert-success mt-3">
            {{ session('create') }}
        </div>
    @endif

        <table class="table table-light table-striped">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->name}}</td>
                    <td>{{$post->slug}}</td>
                    <td>{{$post->tag}}</td>
                    <td>{{($post->category) ? $post->category->name : 'Not'}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-success mx-2" href="{{route('admin.posts.show', ['post' => $post])}}">Preview</a>
                        <a class="btn btn-warning mx-2" href="{{route('admin.posts.edit', ['post' => $post])}}">Edit</a>
                        <form action="{{route('admin.posts.destroy', ['post' => $post])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection