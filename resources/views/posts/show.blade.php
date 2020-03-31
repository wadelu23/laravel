@extends('layout')

@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->content}}</p>

@if ((new Carbon\Carbon())->diffInMinutes($post->created_at) < 5)
    <strong>New!</strong>
@endif

<p>Added {{ $post->created_at->diffForHumans() }}</p>
@endsection('content')