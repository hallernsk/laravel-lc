@extends('layouts.app')

@section('content')
<div>

<h1>Post</h1>


    <div>{{ $post->id }} </div>
    <div>{{ $post->title }}</div>
    <div>{{ $post->content }}</div>
    <div>{{ $post->image }}</div>
    <div>{{ $post->likes }}</div>

    <div>
        <a href="{{ route('post.edit', $post) }}">To edit</a>
    </div>

    <div>
        <!-- <form-action="{{ route('post.destroy', $post) }}" method="POST"> -->
        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
        <input type="submit" value="To delete" class="btn btn-danger">
        </form>
    </div>

    <div>
        <a href="{{ route('post.index') }}">Back</a>
    </div>

</div>
@endsection  