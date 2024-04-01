@extends('layouts.app')

@section('content')
    <main class="container">
    <h1 class=" mb-5">Посты</h1>
        <div class="w-full flex">
            <div>

            {{ Form::open(['url' => route('post.index'), 'method' => 'get']) }}
            <div class="row g-1">

<div class="col">
{{ Form::select('filter[сategory_id]', $categories, $filter['category_id'] ?? null, ['class' => 'form-select me-2','placeholder' => '']) }}
</div>
<div class="col">
{{ Form::select('filter[content_id]', $content, $filter['content_id'] ?? null, ['class' => 'form-select me-2','placeholder' => '']) }}
</div>

<div class="col">
{{ Form::submit( 'Применить', ['class' => 'btn btn-outline-primary me-2'] ) }}
</div>
<div class="col">
{{ Form::close() }}
</div>



</div>
    
                

            </div>

        </div>

        <br>

        <table class="table me-2">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Likes</th>
                    <th>Category_id</th>
                    <!-- @auth
                        <th>{{ __('messages.actions') }}</th>
                    @endauth -->
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td> 
                    <td>{{ $post->image }}</td> 
                    <td>{{ $post->likes }}</td> 
                    <td>{{ $post->category_id }}</td> 
                    <td>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            {{ $posts->links() }}
        </nav>
    </main>
@endsection
