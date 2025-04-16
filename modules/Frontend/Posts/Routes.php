<?php

/*
|--------------------------------------------------------------------------
| Web routes for store module
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Modules\Frontend\Posts\Controllers\PostsController;
use Modules\Frontend\Posts\Controllers\UsefulController;
use Modules\Frontend\Posts\Controllers\TopicController;


Route::get( '/posts/category/{id}', [PostsController::class, 'list'])->name('posts.category');
Route::get( '/posts/group/{id}', [PostsController::class, 'search'])->name('posts.group');
Route::get( '/posts-detail/{id}', [PostsController::class, 'detail'])->name('posts.detail');

Route::get( '/posts-useful', [UsefulController::class, 'list'])->name('posts-useful.list');
Route::get( '/posts-useful-detail/{id}', [UsefulController::class, 'detail'])->name('posts-useful.detail');

Route::get( '/posts-topic-detail/{id}', [TopicController::class, 'detail'])->name('posts-topic.detail');

