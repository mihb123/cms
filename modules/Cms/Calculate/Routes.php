<?php

use Modules\Cms\Calculate\Controllers\CalculateController;
use Modules\Cms\Calculate\Controllers\CategoryController;
use Modules\Cms\Calculate\Controllers\GroupController;
use Modules\Cms\Calculate\Controllers\GroupServiceController;
use Modules\Cms\Calculate\Controllers\PercentageBurdenController;
use Modules\Cms\Calculate\Controllers\ServiceController;
use Modules\Cms\Calculate\Controllers\ServiceCareController;
use Modules\Cms\Calculate\Controllers\ManageController;
use Modules\Cms\Calculate\Controllers\SettingMoneyController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {

    Route::get('/calculate-category/ajax', [CategoryController::class, 'ajax'])
        ->name('calculate-category.ajax');
    Route::post('/calculate-category/changeSort',    [CategoryController::class, 'changeSort'])
        ->name('calculate-category.changeSort');

    Route::get('/calculate-group/ajax', [GroupController::class, 'ajax'])
        ->name('calculate-group.ajax');
    Route::post('/calculate-group/changeSort',    [GroupController::class, 'changeSort'])
        ->name('calculate-group.changeSort');

    Route::get('/percentage-burden/ajax', [PercentageBurdenController::class, 'ajax'])
        ->name('percentage-burden.ajax');

    Route::get('/calculate-service-group/ajax', [GroupServiceController::class, 'ajax'])
        ->name('calculate-service-group.ajax');
    Route::post('/calculate-service-group/changeSort',    [GroupServiceController::class, 'changeSort'])
        ->name('calculate-service-group.changeSort');


    Route::get('/calculate-service/ajax', [ServiceController::class, 'ajax'])
        ->name('calculate-service.ajax');
    Route::post('/calculate-service/changeSort',    [ServiceController::class, 'changeSort'])
        ->name('calculate-service.changeSort');
    Route::post('/calculate-service/getCategory', [ServiceController::class, 'getCategory'])
        ->name('calculate-service.getCategory');

    Route::post('/calculate-manage/getCategory', [ManageController::class, 'getCategory'])
        ->name('calculate-manage.getCategory');
    Route::post('/calculate-manage/getService', [ManageController::class, 'getService'])
        ->name('calculate-manage.getService');
    Route::post('/calculate-manage/changeMoney', [ManageController::class, 'changeMoney'])
        ->name('calculate-manage.changeMoney');
    Route::post('/calculate-manage/changeFixedPrice', [ManageController::class, 'changeFixedPrice'])
        ->name('calculate-manage.changeFixedPrice');
    Route::post('/calculate-manage/getOption', [ManageController::class, 'getOption'])
        ->name('calculate-manage.getOption');

    Route::get('/calculate-service-care/ajax', [ServiceCareController::class, 'ajax'])
        ->name('calculate-service-care.ajax');
    Route::post('/calculate-service-care/changeSort',    [ServiceCareController::class, 'changeSort'])
        ->name('calculate-service-care.changeSort');
    Route::post('/calculate-service-care/getCategory', [ServiceCareController::class, 'getCategory'])
        ->name('calculate-service-care.getCategory');

    Route::post('/setting-money/getCategory', [SettingMoneyController::class, 'getCategory'])
        ->name('setting-money.getCategory');
    Route::post('/setting-money/changeMoney', [SettingMoneyController::class, 'changeMoney'])
        ->name('setting-money.changeMoney'); 

    Route::resource('calculate-category', CategoryController::class);
    Route::resource('calculate-group', GroupController::class);
    Route::resource('percentage-burden', PercentageBurdenController::class);
    Route::resource('calculate-service-group', GroupServiceController::class);
    Route::resource('calculate-service', ServiceController::class);
    Route::resource('calculate-service-care', ServiceCareController::class);
    Route::resource('calculate-manage', ManageController::class);
    Route::resource('setting-money', SettingMoneyController::class);

});
