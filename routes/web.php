<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{param}', function (Request $request, $param) {
    return $request->method();
    return $param;
});

Route::get('/test', function (Request $request) {
    dd('222');
    dd($request->header('user-agent'));
    dd($request->method());
    // dd($request->ip());
    // dd($request->server('REQUEST_URI'));
    // dd($request->session()->all());
    // dd($request->cookie('laravel_session'));
    // dd($request->cookie('laravel_session'));
    // \App\Jobs\SendMessage::dispatch('TEST QUEUE MESSAGE'); //  отправка задачи в очередь (для маршрута '/')
    // \App\Jobs\SendMessage::dispatch('TEST QUEUE MESSAGE')->delay(now()->addMinutes(1)); //  ... с задержкой на 1 минуту
});

// Route::get('/', [PostController::class, 'index'])->name('post.index');

// Route::get('/test', [MyPlaceController::class, 'index']);

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', IndexController::class)->name('post.index');
    Route::get('/posts/create', CreateController::class)->name('post.create');
    Route::post('/posts/store', StoreController::class)->name('post.store');
    Route::get('/posts/{post}', ShowController::class)->name('post.show');
    Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
    // проверка использования middleware (пропускает к редактированию только админа):
    // Route::get('/posts/{post}/edit', EditController::class)->middleware(IsAdminMiddleware::class)->name('post.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
    Route::delete('/posts/{post}', DestroyController::class)->name('post.destroy');

});

// Route::get('/posts', [PostController::class, 'index'])->name('post.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
// Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
// Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');


// Route::get('/posts/update/{id}', [PostController::class, 'update']);
// Route::get('/posts/delete/{id}', [PostController::class, 'delete']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); ///////////////////////
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); // ??
// Route::get('/', [App\Http\Controllers\Post\IndexController::class]);
