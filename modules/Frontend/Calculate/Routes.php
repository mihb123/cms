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
use Modules\Frontend\Calculate\Controllers\CalculateController;


Route::get('/calculate/home', [CalculateController::class, 'home'])->name('calculate.home');
Route::post('/calculate/stepTwo', [CalculateController::class, 'stepTwo'])->name('calculate.stepTwo');
Route::post('/calculate/stepThree', [CalculateController::class, 'stepThree'])->name('calculate.stepThree');

