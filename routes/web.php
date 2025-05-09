<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => config('backend.route')], function() {
    Route::get('/home',     [\App\Http\Controllers\HomeController::class,'admin']);
    Route::get('/logout',   [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name(config('backend.route') . '.logout');

    Auth::routes();
});
