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

use Modules\Frontend\Jigyosho\Controllers\JigyoshoController;
Route::get('/jigyosho', [JigyoshoController::class, 'index'])->name('jigyosho-laravel.index');
Route::get('/jigyosho/map-search', [JigyoshoController::class, 'map_search'])->name('jigyosho.map-search');
Route::get('/jigyosho/{page}', function ($page) {
  $file = public_path("jigyosho-raw/$page.php");
  if (file_exists($file)) {
      include $file;
      exit;
  }
  abort(404);
})->where('page', '[a-zA-Z0-9_-]+');
