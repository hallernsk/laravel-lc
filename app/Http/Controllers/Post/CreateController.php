<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }
}
