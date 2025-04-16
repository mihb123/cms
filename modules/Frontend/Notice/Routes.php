<?php

/*
|--------------------------------------------------------------------------
| Web routes for store module
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Frontend\Notice\Controllers\NoticeController;

Route::get('/notification', [NoticeController::class, 'index'])->name('notification.index');
Route::get( '/notification/detail/{id}', [NoticeController::class, 'detail'])->name('notification.detail');
