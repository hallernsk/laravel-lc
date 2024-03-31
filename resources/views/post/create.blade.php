@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ route('post.store') }}" method="POST">

    @csrf

    <div class="form-group">
    <label for="title">Title</label>
    <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="title"  placeholder="Enter title">

    @error('title')
    <p class="text-danger">{{ $message }}</p>
    @enderror

    </div>

    <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" class="form-control" id="content"  placeholder="Enter content">{{ old('content') }}</textarea>

    @error('content')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>

    <div class="form-group">
    <label for="content">Image</label>
    <input value="{{ old('image') }}" type="text" name="image" class="form-control" id="image"  placeholder="Enter image">

    @error('image')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>

    <div class="form-group">
    <label for="category">Category</label>
        <select class="form-control" id="category" name="category_id">
           @foreach ($categories as $category)
           <option 
           {{ $category->id == old('category_id') ? 'selected' : '' }}
           value="{{ $category->id }}" >{{ $category->title }}</option>
           @endforeach
        </select>
    </div>

    <div class="form-group">
    <label for="tags">Tags</label>
    <select multiple class="form-control" id="tags" name="tags[]">
        @foreach ($tags as $tag)
           <option value="{{ $tag->id }}" >{{ $tag->title }}</option>
         @endforeach
    </select>
    </div>


    <br>
    <button type="submit" class="btn btn-primary">Create</button>

    </form>

</div>
@endsection  
