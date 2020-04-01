@extends('layout')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <p>
            <label for="">Title</label>
            <input type="text" name="title" id="">
        </p>
        <p>
            <label for="">Content</label>
            <input type="text" name="content" id="">
        </p>
        <button type="submit">Create!</button>

    </form>
@endsection