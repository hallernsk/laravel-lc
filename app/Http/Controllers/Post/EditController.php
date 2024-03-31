<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }
}
