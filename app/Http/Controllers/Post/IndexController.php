<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd('test from IndexController!');
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }
}
