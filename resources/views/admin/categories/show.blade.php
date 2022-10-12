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
    </div>

@endsection