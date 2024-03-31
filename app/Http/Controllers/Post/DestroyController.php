<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        if ($post) {
            $post->delete();
            return redirect()->route('post.index');
        }
    }
}
