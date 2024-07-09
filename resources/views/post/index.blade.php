@extends('layouts.main')
@section('content')
    <h1>This is post page</h1>
    <a class="btn btn-primary mt-3 px-lg-5" href="{{route('post.create')}}">Create</a>
    <div>
        @foreach($posts as $post)
            <div class="mt-lg-5">
                <h2> <a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></h2>
                <p>{{ $post->content }}</p>
            </div>
        @endforeach
    </div>

    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
