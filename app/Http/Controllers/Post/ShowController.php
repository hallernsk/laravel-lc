<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        return view('post.show', ['post' => $post]);
    }
}
