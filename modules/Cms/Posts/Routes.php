<?php

use Modules\Cms\Posts\Controllers\PostsController;
use Modules\Cms\Posts\Controllers\CategoryController;
use Modules\Cms\Posts\Controllers\TopicController;
use Modules\Cms\Posts\Controllers\UsefulController;
use Modules\Cms\Posts\Controllers\GroupController;
use Modules\Cms\Posts\Controllers\TopicCategoryController;
use Modules\Cms\Posts\Controllers\UsefulCategoryController;
use Modules\Cms\Posts\Controllers\TypeController;
use Modules\Cms\Posts\Controllers\ManageController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function () {
    Route::get('/posts/ajax', [PostsController::class, 'ajax'])
        ->name('posts.ajax');
    Route::post('/posts/changeSort',    [PostsController::class, 'changeSort'])
        ->name('posts.changeSort');
    Route::post('/posts/displayTop',    [PostsController::class, 'displayTop'])
        ->name('posts.displayTop');

    Route::get('/posts-category/ajax', [CategoryController::class, 'ajax'])
        ->name('posts-category.ajax');
    Route::post('/posts-category/changeSort',    [CategoryController::class, 'changeSort'])
        ->name('posts-category.changeSort');

    Route::get('/posts-topic/ajax', [TopicController::class, 'ajax'])
        ->name('posts-topic.ajax');
    Route::post('/posts-topic/changeSort',    [TopicController::class, 'changeSort'])
        ->name('posts-topic.changeSort');
    Route::get('/posts-topic-category/ajax', [TopicCategoryController::class, 'ajax'])
        ->name('posts-topic-category.ajax');
    Route::post('/posts-topic-category/changeSort',    [TopicCategoryController::class, 'changeSort'])
        ->name('posts-topic-category.changeSort');

    Route::get('/topic-useful/ajax', [UsefulController::class, 'ajax'])
        ->name('topic-useful.ajax');
    Route::post('/posts-useful/changeSort',    [UsefulController::class, 'changeSort'])
        ->name('posts-useful.changeSort');
    Route::get('/posts-useful-category/ajax', [UsefulCategoryController::class, 'ajax'])
        ->name('posts-useful-category.ajax');
    Route::post('/posts-useful-category/changeSort',    [UsefulCategoryController::class, 'changeSort'])
        ->name('posts-useful-category.changeSort');

    Route::get('/posts-group/ajax', [GroupController::class, 'ajax'])
        ->name('posts-group.ajax');
    Route::post('/posts-group/changeSort',    [GroupController::class, 'changeSort'])
        ->name('posts-group.changeSort');

    Route::get('/posts-type/ajax', [TypeController::class, 'ajax'])
        ->name('posts-type.ajax');

    Route::post('/posts-manage/getGroup', [ManageController::class, 'getGroup'])
        ->name('posts-manage.getGroup');
    Route::post('/posts-manage/saveByChecked', [ManageController::class, 'saveByChecked'])
        ->name('posts-manage.saveByChecked');
    Route::post('/posts-manage/deleteByChecked', [ManageController::class, 'deleteByChecked'])
        ->name('posts-manage.deleteByChecked');
    Route::post('/posts-manage/changeSortPost', [ManageController::class, 'changeSortPost'])
        ->name('posts-manage.changeSortPost');

    Route::resource('posts', PostsController::class);
    Route::resource('posts-category', CategoryController::class);
    Route::resource('posts-topic-category', TopicCategoryController::class);
    Route::resource('posts-group', GroupController::class);
    Route::resource('posts-topic', TopicController::class);
    Route::resource('topic-useful', UsefulController::class);
    Route::resource('posts-useful-category', UsefulCategoryController::class);
    Route::resource('posts-type', TypeController::class);
    Route::resource('posts-manage', ManageController::class);
});
