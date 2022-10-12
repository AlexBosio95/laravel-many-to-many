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

        <a class="fs-2" href="{{route('admin.tag.create')}}"><i class="fa-solid fa-square-plus"></i></a>

        <table class="table table-light table-striped">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tag Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-success mx-2" href="{{route('admin.tag.show', ['tag' => $tag])}}">Preview</a>
                        <a class="btn btn-warning mx-2" href="{{route('admin.tag.edit', ['tag' => $tag])}}">Edit</a>
                        <form action="{{route('admin.tag.destroy', ['tag' => $tag])}}" method="POST">
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