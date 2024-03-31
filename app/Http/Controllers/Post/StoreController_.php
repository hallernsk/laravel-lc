<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {
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
}
