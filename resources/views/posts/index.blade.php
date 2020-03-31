@extends('layout')

@section('content')
    @forelse($posts as $post)
        <p>
        <a href="{{ route('posts.show',['post'=>$post->id])}} "><h3>{{  $post->title   }}</h3></a>
        </p>
    @empty
        <p>No blog posts yet!</p>
    @endforelse
@endsection('content')