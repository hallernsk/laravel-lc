@extends('layouts.app')

@section('content')
    <main class="container">
    <h1 class=" mb-5">Posts</h1>
        <div class="w-full flex">
            <div>


  

<form action="{{ route('post.index') }}" method="get">

    <div class="row g-1">

        <div class="col">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ request()->query('title') }}">
        </div>

        <div class="col">    
        <label for="content">Content</label>
        <input type="text" name="content" id="content" class="form-control" value="{{ request()->query('content') }}">
        </div>

        <div class="col">  
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request()->query('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
            @endforeach
        </select>
        </div>

  
        <div class="col">
        <br>
        <button type="submit" class="btn btn-info">Apply</button>
        </div>

        <div class="col text-end">
            <br>
            @auth
            <a href="{{ route('post.create') }}" class="btn btn-primary" >Create Post</a>
            @endauth
        </div>


    </div>


</form>         
    
                

            </div>

        </div>

        <br>

        <table class="table me-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Likes</th>
                    <!-- @auth
                        <th>{{ __('messages.actions') }}</th>
                    @endauth -->
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td> 
                    <td><a href="{{ route('post.show', $post->id) }} ">{{ $post->title }}</a</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->title }}</td>    
                    <td>{{ $post->image }}</td> 
                    <td>{{ $post->likes }}</td> 
                           
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            {{ $posts->links() }}
        </nav>
    </main>
@endsection
