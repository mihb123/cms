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
use Modules\Frontend\Product\Controllers\ProductController;

Route::get( '/product/home', [ProductController::class, 'home'])->name('product.home');
Route::get( '/product-detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get( '/product/list', [ProductController::class, 'list'])->name('product.list');
Route::get( '/product/showListProduct', [ProductController::class, 'showListProduct'])->name('product.showListProduct');
Route::get( '/product/showCompany', [ProductController::class, 'showCompany'])->name('product.showCompany');
Route::post( '/product/showCompanyByService', [ProductController::class, 'showCompanyByService'])->name('product.showCompanyByService');

