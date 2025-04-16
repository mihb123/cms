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

use Modules\Frontend\FamilyMember\Controllers\FamilyMemberController;

Route::get('/mitori-taiken', [FamilyMemberController::class, 'index'])->name('mitori-taiken.index');
Route::get('/mitori-taiken/list', [FamilyMemberController::class, 'list'])->name('mitori-taiken.list');
Route::get( '/mitori-taiken/detail/{id}', [FamilyMemberController::class, 'detail'])->name('mitori-taiken.detail');
