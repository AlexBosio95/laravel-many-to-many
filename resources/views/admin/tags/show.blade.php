@extends('layouts.app')

@section('content')

    <div class="container">

        <a class="btn btn-primary my-4" href="{{route('admin.tag.index')}}">< Back</a>

        <h2 class="text-center">{{$tag->name}}</h2>

        <div class="card">
            <div class="card-header">
                Slug: {{$tag->slug}}
            </div>
        </div>

        <h6 class="mt-3">Tag use in {{$tag->posts->count()}} posts:</h6>
        <ul class="list-group">
            @foreach ($tag->posts as $post)
                <li class="list-group-item">{{$post->name}}</li>
            @endforeach
        </ul>

    </div>

@endsection