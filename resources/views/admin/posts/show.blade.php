@extends('layouts.app')

@section('content')

    <div class="container">

        <a class="btn btn-primary my-4" href="{{route('admin.posts.index')}}">< Back</a>

        <h2 class="text-center">{{$data->name}}</h2>

        <div class="card">
            @if ($data->cover)
                    <img src="{{asset('storage/' . $data->cover)}}" class="card-img-top" alt="...">
                @else
                    <img src="{{asset('img/no_image.jpg')}}" class="card-img-top" alt="...">
            @endif
            
            <div class="card-header">
                {{$data->slug}}
            </div>
            <div class="card-body">
                <p class="card-text text-center">{{$data->content}}</p>
            </div>

            <div class="card-footer text-muted">
                Category: {{($data->category) ? $data->category->name : 'Not'}}
            </div>

            <div class="card-footer text-muted">
                Tags:
                @foreach ($data->tags as $tag)
                    {{$tag->name}}; 
                @endforeach
            </div>
        </div>    
    </div>

@endsection