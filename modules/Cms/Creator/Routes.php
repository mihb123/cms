<?php
use Modules\Cms\Creator\Controllers\CreatorController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {
    Route::get('/creator/ajax', [CreatorController::class, 'ajax'])
        ->name('creator.ajax');
    Route::post('/creator/changeSort',    [CreatorController::class, 'changeSort'])
        ->name('creator.changeSort');

    Route::resource('creator', CreatorController::class);

});
