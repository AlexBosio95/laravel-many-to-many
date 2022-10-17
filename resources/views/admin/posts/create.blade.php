@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-3">
            <a class="gestion-btn" href="{{route('admin.posts.index')}}">< Back</i></a>
        </div>

        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-2">
                <label for="coverImage" class="form-label">Image</label>
                <input type="file" name="image" id="coverImage" class="form-control file">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            
            <label for="name" class="form-label">Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Title" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <label for="content" class="form-label">Content</label>
            <div class="input-group mb-3">
                <textarea placeholder="Post content" class="form-control @error('content') is-invalid @enderror" aria-label="With textarea" name="content">{{old('content')}}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="CategorySelect">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="CategorySelect" name="category_id">
                    <option {{(old('category_id') == "")?'selected':''}} value="">No Category</option>
                    @foreach ($categories as $category)
                        <option {{(old('category_id') == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
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
                    <input {{(in_array($tag->id, old('tags', []))) ? 'checked' : ''}} name='tags[]' class="form-check-input" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}">
                    <label class="form-check-label" for="{{$tag->id}}">{{$tag->name}}</label>
                </div>
                @endforeach

                @error('tags')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mt-4">
                <button type="submit" class="gestion-btn">Create</button>
            </div>
        </form>
        
    </div>

@endsection