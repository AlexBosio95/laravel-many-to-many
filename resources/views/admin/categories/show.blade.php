@extends('layouts.app')

@section('content')

    <div class="container">

        <a class="btn btn-primary my-4" href="{{route('admin.category.index')}}">< Back</a>

        <h2 class="text-center">{{$dataCategory->name}}</h2>

        <div class="card">
            <div class="card-header">
                Slug: {{$dataCategory->slug}}
            </div>
        </div>

        <h6 class="mt-3">Category use in {{$dataCategory->posts->count()}} posts:</h6>
        <ul class="list-group">
            @foreach ($dataCategory->posts as $post)
                <li class="list-group-item">{{$post->name}}</li>
            @endforeach
        </ul>
    </div>


@endsection