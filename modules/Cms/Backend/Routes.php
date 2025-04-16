<?php

use Modules\Cms\Backend\Controllers\AdminController;
use Modules\Cms\Backend\Controllers\DashboardController;
use Modules\Cms\Backend\Controllers\SettingController;
use Modules\Cms\Backend\Controllers\AjaxController;
use Modules\Cms\Backend\Controllers\RoleController;
use Modules\Cms\Backend\Controllers\PermController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function() {

    Route::get('/', [DashboardController::class,'index'])->name('backend.index');
    Route::get('/dashboard', [DashboardController::class,'index'])->name('backend.dashboard');

    Route::get('/admin/ajax',               [AdminController::class,'ajax'])->name('admin.ajax');
    Route::get('/admin/search',             [AdminController::class,'search'])->name('admin.search');
    Route::any('/admin/{user}/password',    [AdminController::class,'password'])->name('admin.password');
    Route::get('/settings/ajax',            [SettingController::class,'ajax'])->name('setting.ajax');
    Route::get('/ajax/search',              [AjaxController::class,'search'])->name('ajax.search');
    Route::get('/ajax/searchOption',        [AjaxController::class,'searchOption'])->name('ajax.searchOption');

    # Team resource routes
    Route::resource('admin',                AdminController::class);
    Route::resource('roles',                RoleController::class);
    Route::resource('perms',                PermController::class);
    Route::resource('settings',             SettingController::class);

});
