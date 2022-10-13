@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('update'))
        <div class="alert alert-success mt-3">
            {{ session('update') }}
        </div>
    @endif

        <form action="{{route('admin.posts.update', ['post' => $data])}}" method="POST">

            @csrf
            @method('PUT')
            
            <label for="name" class="form-label">Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Title" name="name" value="{{old('name', $data->name)}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <label for="content" class="form-label">Content</label>
            <div class="input-group mb-3">
                <textarea placeholder="Post content" class="form-control @error('content') is-invalid @enderror" aria-label="With textarea" name="content">{{old('content', $data->content)}}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="CategorySelect">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="CategorySelect" name="category_id">
                    <option {{(old('category_id') == "")?'selected':''}} value="">No Category</option>
                    @foreach ($categories as $category)
                        <option {{(old('category_id', $data->category_id) == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <h5>Select tags:</h5>
                @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    @if ($errors->any())
                    <input {{(in_array($tag->id, old('tags', []))) ? 'checked' : ''}} name='tags[]' class="form-check-input" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}">
                    @else
                    <input {{($data->tags->contains($tag))?'checked':''}} name='tags[]' class="form-check-input" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}">
                    @endif
                    <label class="form-check-label" for="{{$tag->id}}">{{$tag->name}}</label>
                </div>
                @endforeach

                @error('tags')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="gestion-btn mt-3">Update</button>
        </form>
        
    </div>

@endsection