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
        <div class="my-3">
            <a class="gestion-btn" href="{{route('admin.posts.create')}}">Add <i class="fa-solid fa-plus"></i></a>
            <a class="gestion-btn" href="{{route('admin.category.index')}}">Management <i class="fa-solid fa-book"></i></a>
            <a class="gestion-btn" href="{{route('admin.tag.index')}}">Management <i class="fa-solid fa-hashtag"></i></a>
        </div>

        <table class="table table-light table-striped mt-4">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <th scope="row">
                        @if ($post->cover)
                                <img src="{{asset('storage/' . $post->cover)}}" class="w-25 " alt="...">
                            @else
                                <img src="{{asset('img/no_image.jpg')}}" class="w-25" alt="...">
                        @endif
                    </th>
                    <td>{{$post->name}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                            {{$tag->name}}; 
                        @endforeach
                    </td>
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