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
        <a class="gestion-btn" href="{{route('admin.posts.index')}}">< Back</i></a>
        <a class="gestion-btn" href="{{route('admin.category.create')}}">Add <i class="fa-solid fa-plus"></i></a>
    </div>

        <table class="table table-light table-striped">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-success mx-2" href="{{route('admin.category.show', [ 'category' => $category])}}">Preview</a>
                        <a class="btn btn-warning mx-2" href="{{route('admin.category.edit', ['category' => $category])}}">Edit</a>
                        <form action="{{route('admin.category.destroy', ['category' => $category])}}" method="POST">
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