@extends('layout')

@section('content')
    @forelse($posts as $post)
    <p>
        <a href="{{ route('posts.show',['post'=>$post->id])}} "><h3>{{  $post->title   }}</h3></a>

        @if($post->comments_count)
            <p>{{ $post->comments_count }} comments</p>
        @else
            <p>No Comments yet!</p>
        @endif

        <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-primary">Edit</a>
        
        <form method="POST" class="fm-inline" action="{{ route('posts.destroy',['post' => $post->id]) }}" >
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete!" class="btn btn-danger">
        </form>
    </p>
    @empty
        <p>No blog posts yet!</p>
    @endforelse
@endsection('content')