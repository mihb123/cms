<?php

use Modules\Cms\Tag\Controllers\TagController;
use Modules\Cms\Tag\Controllers\TagGroupCategoryController;
use Modules\Cms\Tag\Controllers\TagGroupController;
use Modules\Cms\Tag\Controllers\TagNewsController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {
    Route::get('/tag/ajax', [TagController::class, 'ajax'])
        ->name('tag.ajax');
    Route::post('/tag/changeSort',    [TagController::class, 'changeSort'])
        ->name('tag.changeSort');

    Route::get('/tag-group-category/ajax', [TagGroupCategoryController::class, 'ajax'])
        ->name('tag-group-category.ajax');
    Route::post('/tag-group-category/changeSort',    [TagGroupCategoryController::class, 'changeSort'])
        ->name('tag-group-category.changeSort');

    Route::get('/tag-group/ajax', [TagGroupController::class, 'ajax'])
        ->name('tag-group.ajax');
    Route::post('/tag-group/changeSort',    [TagGroupController::class, 'changeSort'])
        ->name('tag-group.changeSort');

    Route::get('/tag-news/ajax', [TagNewsController::class, 'ajax'])
        ->name('tag-news.ajax');
    Route::post('/tag-news/changeSort',    [TagNewsController::class, 'changeSort'])
        ->name('tag-news.changeSort');

    Route::resource('tag', TagController::class);
    Route::resource('tag-group-category', TagGroupCategoryController::class);
    Route::resource('tag-group', TagGroupController::class);
    Route::resource('tag-news', TagNewsController::class);

});
