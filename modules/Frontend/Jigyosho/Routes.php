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
use Illuminate\Support\Str;
use Modules\Frontend\Jigyosho\Controllers\JigyoshoController;
Route::get('/jigyosho', [JigyoshoController::class, 'index'])->name('jigyosho-laravel.index');
Route::get('/jigyosho/map-search', [JigyoshoController::class, 'map_search'])->name('jigyosho.map-search');
Route::get('/jigyosho/{file}', function ($file) {
  $path = public_path('jigyosho-raw/' . $file);
  if (!file_exists($path)) {
    abort(404);
  }
  if (Str::endsWith($file, '.php')) {
    chdir(dirname($path));
    ob_start();

    // handle error path asset. Ex: require_once$docrt.'/head_tag_elements.php';
    $handle = fopen($path, 'r');
    $new = '';
    while ($line = fgets($handle)) {
      if (Str::contains($line, '$_SERVER[\'DOCUMENT_ROOT\']')) {
        if(Str::contains($line, '/jigyosho-raw')){
          // no change
        } elseif(Str::contains($line, '/jigyosho')) {
          $line = str_replace('/jigyosho', '/jigyosho-raw', $line);
        } else{
          $line = str_replace('$_SERVER[\'DOCUMENT_ROOT\']', '$_SERVER[\'DOCUMENT_ROOT\']' . '."/jigyosho-raw"', $line);
        }        
      }
      $new .= $line;
    };
    fclose($handle);
    eval ('?>' . $new);
    // handle point wrong path asset
    $content = ob_get_clean();
    $content = preg_replace_callback(
      '/(src|href)=["\'](?!https?:\/\/|\/\/)([^"\']+)["\']/',
      function ($matches) {
        $attribute = $matches[1];
        $originalPath = $matches[2];
        $cleanPath = ltrim($originalPath, './');
        return $attribute . '="/jigyosho-raw/' . $cleanPath . '"';
      },
      $content
    );
    return response($content);
  }
  return response()->file($path);
})->where('file', '.*');