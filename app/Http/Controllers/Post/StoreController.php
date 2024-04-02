<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        dd('postman-StoreController');
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => '',
        ]);

        $this->service->store($data);

        return redirect()->route('post.index');
    }
}
