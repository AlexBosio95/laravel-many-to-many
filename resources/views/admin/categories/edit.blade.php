@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('update'))
        <div class="alert alert-success mt-3">
            {{ session('update') }}
        </div>
    @endif

        <form action="{{route('admin.category.update', ['category' => $dataCategory])}}" method="POST">

            @csrf
            @method('PUT')
            
            <label for="name" class="form-label">Name Category</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Title" name="name" value="{{old('name', $dataCategory->name)}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </div>

@endsection