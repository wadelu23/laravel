@extends('layout')

@section('content')
    @forelse($posts as $post)
        <p>
        <a href="{{ route('posts.show',['post'=>$post->id])}} "><h3>{{  $post->title   }}</h3></a>
        <a href="{{ route('posts.edit',['post'=>$post->id]) }}">Edit</a>
        </p>
        <form action="{{ route('posts.destroy',['post' => $post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete!">
        </form>

    @empty
        <p>No blog posts yet!</p>
    @endforelse
@endsection('content')