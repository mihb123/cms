<?php
use Modules\Cms\Partner\Controllers\PartnerController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {
    Route::get('/partner/ajax', [PartnerController::class, 'ajax'])
        ->name('partner.ajax');
    Route::post('/partner/changeSort',    [PartnerController::class, 'changeSort'])
        ->name('partner.changeSort');

    Route::resource('partner', PartnerController::class);

});
