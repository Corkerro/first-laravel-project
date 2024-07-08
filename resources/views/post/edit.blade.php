@extends('layouts.main')
@section('content')
    <h1>This is post update page</h1>
    <form action="{{ route('post.update', $post->id) }}" method="post" class="d-flex flex-column gap-3">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" name="image" id="image" value="{{ $post->image }}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option {{ $category->id === $post->category->id ? ' selected="selected"' : '' }}
                        value="{{ $category->id }}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ?'selected' : '' }}

                        value="{{ $tag->id }}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('post.show', $post->id) }}">Back</a>
    </form>
@endsection
