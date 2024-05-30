<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Controllers\Post\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // проверка использования redis (для кеширования)
        // $posts = Cache::rememberForever('posts:all', function () {
        //     return Post::all();
        // });
        // $posts = Cache::get('posts:all');
        // dd($posts->pluck('title'));



        $title = $request->query('title');
        // dd($title);
        $content = $request->query('content');
        $categoryId = $request->query('category_id');

        // $categoryId = 4;
        // dd($categoryId);

        $posts = Post::query();
        //  Post::query() - запрос (метод Eloquent, который создает новый экземпляр построителя запросов для модели Post)
        //  Post::all() - массив (всех постов)


        if ($title) {
            $posts->where('title', 'like', '%' . $title . '%');
        }

        if ($content) {
            $posts->where('content', 'like', '%' . $content . '%');
        }


        if ($categoryId) {
            // dd('qqq');
            $posts->where('category_id', $categoryId);
        }

        $posts = $posts->paginate(10);

        $categories = Category::all();
        // $posts = $posts->get();
        // dd($categories);
        // return view('index', ['posts' => $posts]);


        // $posts = Post::all();
        // ->where('category_id', 5);
        // dd($posts);
        // $posts = Post::paginate(20);
        // dd($posts);
        return view('post.index', ['posts' => $posts, 'categories' => $categories]);
    }
}
