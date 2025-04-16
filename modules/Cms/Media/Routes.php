<?php

/*
|--------------------------------------------------------------------------
| Web routes for media module
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| @link(https://www.rapidtables.com/convert/number/decimal-to-hex.html)
|
*/

Route::get('media',                                     'MediaController@index')->name('media.index');

Route::get('media/uploaded',                            'MediaController@uploaded')->name('media.uploaded');

Route::get('media/{vendor}/{file}',                     'MediaController@media')->name('media.download');

Route::get('cache/{width}/{vendor}/{file}',             'MediaController@cache')->name('media.cache');


Route::get('cache/{width}/{height}/{vendor}/{file}',    'MediaController@optimize')->name('media.optimize');

Route::post('media/upload',                             'MediaController@upload')->name('media.upload');
Route::post('media/uploadFile',                         'MediaController@uploadFile')->name('media.uploadFile');
Route::post('media/deleteFile',                         'MediaController@deleteFile')->name('media.deleteFile');
Route::post('media/update',                             'MediaController@update')->name('media.update');
Route::post('media/delete',                             'MediaController@delete')->name('media.delete');
