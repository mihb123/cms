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
use Modules\Frontend\Tag\Controllers\TagController;


Route::get( '/tag/category/{id}', [TagController::class, 'list'])->name('tag.list');
Route::get( '/tag-detail/{id}', [TagController::class, 'detail'])->name('tag.detail');

