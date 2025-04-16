<?php

use Modules\Cms\SiteMap\Controllers\ManageController;
use Modules\Cms\SiteMap\Controllers\SiteMapController;


Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {
    Route::get('/sitemap/ajax', [SiteMapController::class, 'ajax'])
        ->name('sitemap.ajax');
    Route::post('/sitemap/changeSort', [SiteMapController::class, 'changeSort'])
        ->name('sitemap.changeSort');

    Route::resource('sitemap', SiteMapController::class);
    Route::resource('sitemap-manage', ManageController::class);

});
