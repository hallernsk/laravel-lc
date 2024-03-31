<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $category = Category::find(2);
        // dd($category->posts);


        // dd($post->tags);

        // $tag = Tag::find(1);
        // dd($tag->posts);


        // $posts = Post::where('category_id', $category->id)->get();
        $posts = Post::all();

        return view('post.index', ['posts' => $posts]);

    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function store()
    {
        // return view('post.create');
        // dd($_POST);
        // dd('testttttwwwww');
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => '',
        ]);


        $tags = $data['tags'] ?? [];
        unset($data['tags']);
        // dd($tags, $data);

        $post = Post::create($data);

        $post->tags()->attach($tags);


        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        // dd($post);
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        // $post = Post::findOrFail($id);
        // dd($post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }


    public function update(Post $post)
    {
        // dd('test');

        $data = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => '',
        ]);
        // dd($data);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', ['post' => $post->id]);
    }

    public function destroy(Post $post)
    {
        // $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->route('post.index');
        }
    }



    public function delete($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();
        dd($post);
        if ($post) {
            echo "Запись успешно удалена.";
        } else {
            echo "Произошла ошибка при удалении записи.";
        }
    }
}
