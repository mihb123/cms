<?php

use App\Models\FamilyMemberNews;
use Modules\Cms\FamilyMember\Controllers\FamilyMemberController;
use Modules\Cms\FamilyMember\Controllers\NewsController;
use Modules\Cms\FamilyMember\Controllers\TagController;
use Modules\Cms\FamilyMember\Controllers\TagGroupController;
use Modules\Cms\FamilyMember\Controllers\CategoryController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {
    Route::get('/family-member/ajax', [FamilyMemberController::class, 'ajax'])
        ->name('family-member.ajax');
        
    Route::get('/family-member-news/ajax', [NewsController::class, 'ajax'])
        ->name('family-member-news.ajax');
    Route::post('/family-member-news/changeSort',    [NewsController::class, 'changeSort'])
        ->name('family-member-news.changeSort');

    Route::get('/family-member-tag/ajax', [TagController::class, 'ajax'])
        ->name('family-member-tag.ajax');
    Route::post('/family-member-tag/changeSort',    [TagController::class, 'changeSort'])
        ->name('family-member-tag.changeSort');

    Route::get('/family-member-tag-group/ajax', [TagGroupController::class, 'ajax'])
        ->name('family-member-tag-group.ajax');
    Route::post('/family-member-tag-group/changeSort',    [TagGroupController::class, 'changeSort'])
        ->name('family-member-tag-group.changeSort');

    Route::get('/family-member-category/ajax', [CategoryController::class, 'ajax'])
        ->name('family-member-category.ajax');
    Route::post('/family-member-category/changeSort',    [CategoryController::class, 'changeSort'])
        ->name('family-member-category.changeSort');

    Route::resource('family-member', FamilyMemberController::class);
    Route::resource('family-member-news', NewsController::class);
    Route::resource('family-member-tag', TagController::class);
    Route::resource('family-member-tag-group', TagGroupController::class);
    Route::resource('family-member-category', CategoryController::class);
});
