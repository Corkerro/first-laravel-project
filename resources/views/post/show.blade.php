@extends('layouts.main')
@section('content')
    <h1>This is post {{ $post->id }} page</h1>
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <a href="{{ route('post.edit', $post->id) }}">Edit</a>
        <a href="{{ route('post.index') }}">Back</a>
        <br>
        <form action="{{ route('post.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
