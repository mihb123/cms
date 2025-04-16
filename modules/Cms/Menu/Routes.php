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

use Modules\Cms\Menu\Controllers\MenuController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin', 'can:backend.view']], function () {

    Route::resource('menu',     MenuController::class);
});
