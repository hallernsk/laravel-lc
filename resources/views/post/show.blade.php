@extends('layouts.app')

@section('content')
<div class="container">

<h1>Post</h1>


    <div><h5>ID: </h5></div>
    <div>{{ $post->id }} </div><br>
    <div><h5>Title: </h5></div>
    <div>{{ $post->title }}</div><br>
    <div><h5>Content: </h5></div>
    <div>{{ $post->content }}</div><br>
    <div><h5>Image: </h5></div>
    <div>{{ $post->image }}</div><br>
    <div><h5>Likes: </h5></div>
    <div>{{ $post->likes }}</div><br>

    <div>
        <a href="{{ route('post.edit', $post) }}">To edit</a>
    </div>
    <br>
    <div>
        <!-- <form-action="{{ route('post.destroy', $post) }}" method="POST"> -->
        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
        <input type="submit" value="To delete" class="btn btn-danger">
        </form>
    </div>
<br>
    <div>
        <a href="{{ route('post.index') }}">Back</a>
    </div>

</div>
@endsection  