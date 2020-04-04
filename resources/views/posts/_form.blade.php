<p>
    <label for="">Title</label>
    <input type="text" name="title" value="{{ old('title', $post->title ?? null) }}">
</p>
<p>
    <label for="">Content</label>
    <input type="text" name="content" value="{{ old('content', $post->content ?? null) }}">
</p>

@if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif