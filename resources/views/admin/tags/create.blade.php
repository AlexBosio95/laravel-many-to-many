@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-3">
            <a class="gestion-btn" href="{{route('admin.tag.index')}}">< Back</i></a>
        </div>

        <form action="{{route('admin.tag.store')}}" method="POST">
            @csrf
            
            <label for="name" class="form-label">Tag Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name tag" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="gestion-btn">Create</button>
        </form>
        
    </div>

@endsection