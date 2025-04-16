<?php

use Modules\Cms\Banners\Controllers\BannersController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function () {
    Route::get('/banners/ajax', [BannersController::class, 'ajax'])
        ->name('banners.ajax');
    Route::post('/banners/changeSort',    [BannersController::class, 'changeSort'])
        ->name('banners.changeSort');

    Route::resource('banners', BannersController::class);
    
});
