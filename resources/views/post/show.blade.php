@extends('layouts.app')

@section('content')
<div class="container">

<h3><p class="text-primary">Post</p></h3>


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
        <a class="text-info" href="{{ route('post.edit', $post) }}">To edit</a>
    </div>
    <br>
    
    @auth
    <div>    
        <form action="{{ route('post.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
        <input type="submit" value="To delete" class="btn btn-danger">
        </form>   
    </div>
    @endauth
<br>
    <div>
        <a href="{{ route('post.index') }}">Back</a>
    </div>

</div>
@endsection  