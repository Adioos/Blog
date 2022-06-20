<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', IndexController::class)->name('post.index');
    Route::get('/{post}', ShowController::class)->name('post.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Personal\Main', 'prefix' => 'personal/main', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', IndexController::class)->name('personal.main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Personal\Liked', 'prefix' => 'personal/liked', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', IndexController::class)->name('personal.liked.index');
    Route::delete('/{post}', DeleteController::class)->name('pesonal.liked.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Personal\Comment', 'prefix' => 'personal/comment',], function () {
    Route::get('/', IndexController::class)->name('personal.comment.index');
    Route::get('/{comment}/edit', EditController::class)->name('personal.comment.edit');
    Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');
    Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Main', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', IndexController::class)->name('admin.main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Post', 'prefix' => 'admin/posts'], function () {
    Route::get('/', IndexController::class)->name('admin.post.index');
    Route::get('/create', CreateController::class)->name('admin.post.create');
    Route::post('/', StoreController::class)->name('admin.post.store');
    Route::get('/{post}', ShowController::class)->name('admin.post.show');
    Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
    Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
    Route::delete('/{post}', DeleteController::class)->name('admin.post.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Category', 'prefix' => 'admin/categories'], function () {
    Route::get('/', IndexController::class)->name('admin.category.index');
    Route::get('/create', CreateController::class)->name('admin.category.create');
    Route::post('/', StoreController::class)->name('admin.category.store');
    Route::get('/{category}', ShowController::class)->name('admin.category.show');
    Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
    Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
    Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin\Tag', 'prefix' => 'admin/tags'], function () {
    Route::get('/', IndexController::class)->name('admin.tag.index');
    Route::get('/create', CreateController::class)->name('admin.tag.create');
    Route::post('/', StoreController::class)->name('admin.tag.store');
    Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
    Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
    Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
    Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
});  

Route::group(['namespace' => 'App\Http\Controllers\Admin\User', 'prefix' => 'admin/users'], function () {
    Route::get('/', IndexController::class)->name('admin.user.index');
    Route::get('/create', CreateController::class)->name('admin.user.create');
    Route::post('/', StoreController::class)->name('admin.user.store');
    Route::get('/{user}', ShowController::class)->name('admin.user.show');
    Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
    Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
    Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
});


Auth::routes(['verify' => true]);
