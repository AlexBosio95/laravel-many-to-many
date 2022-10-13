@extends('layouts.app')

@section('content')

    <div class="container">

        

        @if (session('update'))
            <div class="alert alert-success mt-3">
                {{ session('update') }}
            </div>
        @endif

        <div class="my-3">
            <a class="gestion-btn" href="{{route('admin.tag.index')}}">< Back</i></a>
        </div>

        <form action="{{route('admin.tag.update', ['tag' => $tag])}}" method="POST">

            @csrf
            @method('PUT')
            
            <label for="name" class="form-label">Name Tag</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Tag name" name="name" value="{{old('name', $tag->name)}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="gestion-btn">Update</button>
        </form>
        
    </div>

@endsection