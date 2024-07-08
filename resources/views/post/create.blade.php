@extends('layouts.main')
@section('content')
    <h1>This is post create page</h1>
    <form action="{{ route('post.store') }}" method="post" class="d-flex flex-column gap-3">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input
                value="{{ old('title') }}"
                type="text" name="title"
                class="form-control" id="title" placeholder="Title">
            @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content">{{ old('content') }}</textarea>
            @error('content')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Images</label>
            <input value="{{ old('image') }}"
                   type="text" class="form-control"
                   name="image" id="image" placeholder="Image">
            @error('image')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
