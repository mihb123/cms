<?php

use Modules\Cms\Notice\Controllers\NoticeController;
use Modules\Cms\Notice\Controllers\NoticeCategoryController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {
    Route::get('/notice/ajax', [NoticeController::class, 'ajax'])
        ->name('notice.ajax');
    Route::post('/notice/changeSort',    [NoticeController::class, 'changeSort'])
        ->name('notice.changeSort');
        
    Route::get('/notice-category/ajax', [NoticeCategoryController::class, 'ajax'])
        ->name('notice-category.ajax');
    Route::resource('notice', NoticeController::class);
    Route::resource('notice-category', NoticeCategoryController::class);

});
