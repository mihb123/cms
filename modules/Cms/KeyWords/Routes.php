<?php

use Modules\Cms\KeyWords\Controllers\KeyWordsController;
use Modules\Cms\KeyWords\Controllers\GroupController;

Route::group(['prefix' => config('backend.route'), 'middleware' => ['admin']], function () {
    Route::get('/key-words/ajax', [KeyWordsController::class, 'ajax'])
        ->name('key-words.ajax');
    Route::post('/key-words/changeSort',    [KeyWordsController::class, 'changeSort'])
        ->name('key-words.changeSort');

    Route::get('/key-words-group/ajax', [GroupController::class, 'ajax'])
        ->name('key-words-group.ajax');
    Route::post('/key-words-group/changeSort',    [GroupController::class, 'changeSort'])
        ->name('key-words-group.changeSort');

    Route::resource('key-words', KeyWordsController::class);
    Route::resource('key-words-group', GroupController::class);
    
});
