<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => '',
        ]);
        // dd($data);

        $this->service->update($post, $data);


        return redirect()->route('post.show', ['post' => $post->id]);
    }
}
