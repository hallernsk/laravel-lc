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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [PostController::class, 'index'])->name('post.index');

// Route::get('/test', [MyPlaceController::class, 'index']);

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', IndexController::class)->name('post.index');
    Route::get('/posts/create', CreateController::class)->name('post.create');
    Route::post('/posts/store', StoreController::class)->name('post.store');
    Route::get('/posts/{post}', ShowController::class)->name('post.show');
    Route::get('/posts/{post}/edit', EditController::class)->middleware(IsAdminMiddleware::class)->name('post.edit');
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); // ??
// Route::get('/', [App\Http\Controllers\Post\IndexController::class]);
