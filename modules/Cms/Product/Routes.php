<?php

use Modules\Cms\Product\Controllers\ProductController;
use Modules\Cms\Product\Controllers\CategoryController;
use Modules\Cms\Product\Controllers\CategoryNewsController;
use Modules\Cms\Product\Controllers\CompanyController;
use Modules\Cms\Product\Controllers\ServiceController;
use Modules\Cms\Product\Controllers\NewsController;
use Modules\Cms\Product\Controllers\FactoryController;
use Modules\Cms\Product\Controllers\GroupCategoryController;
use Modules\Cms\Product\Controllers\OptionController;
use PhpOption\Option;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function () {

    Route::get('/product/ajax', [ProductController::class, 'ajax'])
        ->name('product.ajax');
    Route::post('/product/changeSort',    [ProductController::class, 'changeSort'])
        ->name('product.changeSort');
    Route::post('/product/getKeyWords',    [ProductController::class, 'getKeyWords'])
        ->name('product.getKeyWords');

    Route::get('/product-category/ajax', [CategoryController::class, 'ajax'])
        ->name('product-category.ajax');
    Route::post('/product-category/changeSort',    [CategoryController::class, 'changeSort'])
        ->name('product-category.changeSort');
    Route::post('/product-category/display',    [CategoryController::class, 'display'])
        ->name('product-category.display');

    Route::get('/product-category-news/ajax', [CategoryNewsController::class, 'ajax'])
        ->name('product-category-news.ajax');
    Route::post('/product-category-news/changeSort',    [CategoryNewsController::class, 'changeSort'])
        ->name('product-category-news.changeSort');
    Route::post('/product-category-news/display',    [CategoryNewsController::class, 'display'])
        ->name('product-category-news.display');

    Route::get('/company/ajax', [CompanyController::class, 'ajax'])
        ->name('company.ajax');
    Route::post('/company/changeSort',    [CompanyController::class, 'changeSort'])
        ->name('company.changeSort');

    Route::get('/company-service/ajax', [ServiceController::class, 'ajax'])
        ->name('company-service.ajax');
    Route::post('/company-service/display',    [ServiceController::class, 'display'])
        ->name('company-service.display');

    Route::get('/product-news/ajax', [NewsController::class, 'ajax'])
        ->name('product-news.ajax');
    Route::post('/product-news/changeSort',    [NewsController::class, 'changeSort'])
        ->name('product-news.changeSort');
    Route::post('/product-news/display',    [NewsController::class, 'display'])
        ->name('product-news.display');

    Route::get('/factory/ajax', [FactoryController::class, 'ajax'])
        ->name('factory.ajax');

    Route::get('/product-group-category/ajax', [GroupCategoryController::class, 'ajax'])
        ->name('product-group-category.ajax');
    Route::post('/product-group-category/changeSort',    [GroupCategoryController::class, 'changeSort'])
        ->name('product-group-category.changeSort');
    Route::post('/product-group-category/display',    [GroupCategoryController::class, 'display'])
        ->name('product-group-category.display');

    Route::get('/product-option/ajax', [OptionController::class, 'ajax'])
        ->name('product-option.ajax');
    Route::post('/product-option/getProductAndCompany', [OptionController::class, 'getProductAndCompany'])
        ->name('product-option.getProductAndCompany');

    Route::resource('product', ProductController::class);
    Route::resource('product-category', CategoryController::class);
    Route::resource('product-category-news', CategoryNewsController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('company-service', ServiceController::class);
    Route::resource('product-news', NewsController::class);
    Route::resource('factory', FactoryController::class);
    Route::resource('product-group-category', GroupCategoryController::class);
    Route::resource('product-option', OptionController::class);
});
