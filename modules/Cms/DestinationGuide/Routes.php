<?php

use Modules\Cms\DestinationGuide\Controllers\DestinationGuideController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function () {
    Route::get('/destination-guide/ajax', [DestinationGuideController::class, 'ajax'])
        ->name('destination-guide.ajax');


    Route::resource('destination-guide', DestinationGuideController::class);
    
});
