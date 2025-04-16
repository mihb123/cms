<?php

namespace Modules\Cms\Media\Controllers;

use App\Helpers\CommonHelper;
use Log;
use Auth;
use Image;
use Storage;
use Response;
use App\Common\Response as ResponseApi;
use App\Files;

use Modules\Cms\Media\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Handle user requests
 * @package Modules\Store
 */
class MediaController extends Controller
{
    public function index(Request $request)
    {
        return ['Show list media'];
    }

    public function update(Request $request)
    {
        // Validate media metadata
        $this->validate($request, [
            'id' => 'required|string|max:32',
            'caption' => 'required|string|max:255',
        ]);

        $id = $request->input('id');
        $caption = $request->input('caption');

        $media = Media::where(['id' => $id])->update(['caption' => $caption]);

        return $media;
    }

    public function delete(Request $request)
    {
        // Validate media metadata
        $this->validate($request, [
            'id' => 'required|string|max:32',
        ]);

        $media = $request->input('id');
        $media = Media::where(['id' => $media])->first();
        $media->forceDelete();

        if ($media) {
            // Delete image on disk
            Storage::disk('media')->delete($media->path);
        }

        return $media;
    }

    /**
     * Get list media has uploaded for listing dialog
     */
    public function uploaded(Request $request)
    {
        if (!empty(Auth::user())) {
            $files = Media::where('createdBy', Auth::user()->id);
        } else {
            $files = Media::where('createdBy', Auth::guard('user')->user()->id);
        }


        if ($request->has('vendor')) {
            $vendor = $request->input('vendor');
            if (is_numeric($vendor)) {
                $vendor = dechex($vendor);
            }
            $files = Media::where('vendor', $vendor)->orderByDesc('id');
        }

        $files = $files->get();

        $uploads = [];
        foreach ($files as $item) {
            $uploads[] = [
                'id' => $item->id,
                'name' => $item->name,
                'ext' => $item->ext,
                'width' => $item->width,
                'height' => $item->height,
                'caption' => $item->caption,
                'src' => $item->path,
                'size' => $this->formatBytesToMB($item->size),
                'link' => image($item->path),
                'thumb' => thumb($item->path, 200)
            ];
        }
        return [
            'uploads' => $uploads
        ];
    }

    function formatBytesToMB($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . $units[$pow];
    }

    /**
     * Get image with origin size
     */
    public function media($vendor, $file)
    {
        $file = "{$vendor}/{$file}";
        $name = "media/{$file}";
        $path = storage_path($name);

        if (false == Storage::disk('media')->exists($file)) {
            return Response::make('File not found: ' . $name, 404);
        }

        return response()->file($path);
    }

    /**
     * Get image with cache size
     */
    public function cache($width, $vendor, $file)
    {
        // Cache image information
        $cacheDir  = "{$width}/{$vendor}";
        $cacheFile = "{$cacheDir}/{$file}";
        $cacheName = "cache/{$cacheFile}";
        $cachePath = storage_path($cacheName);

        // Origin image information
        $mediaFile = "{$vendor}/{$file}";
        $mediaName = "media/{$mediaFile}";
        $mediaPath = storage_path($mediaName);

        // Check cache image exists
        if (Storage::disk('cache')->exists($cacheFile)) {
            return response()->file($cachePath);
        }

        // Check media image exists
        if (Storage::disk('media')->exists($mediaFile) == false) {
            return Response::make('File not found: ' . $mediaPath, 404);
        }

        // Create cache dir
        Storage::disk('cache')->makeDirectory($cacheDir);

        // Create image instance
        $image = Image::make($mediaPath);

        // Get new width and check limit
        $newWidth = hexdec($width);
        $newWidth = $newWidth > $image->width() ? $image->width() : $newWidth;
        $newWidth = $newWidth > config("constants.MEDIA_MAX_WIDTH") ? config("constants.MEDIA_MAX_WIDTH") : $newWidth;

        // Resize image to width
        $image->resize($newWidth, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Save cache image to disk
        $image->save($cachePath);

        // Response image to client
        return $image->response($image->mime());
    }

    /**
     * Get image with keep full image size
     */
    public function optimize($width, $height, $vendor, $file)
    {
        // Cache image information
        $cacheDir  = "{$width}/{$height}/{$vendor}";
        $cacheFile = "{$cacheDir}/{$file}";
        $cacheName = "cache/{$cacheFile}";
        $cachePath = storage_path($cacheName);

        // Check and resize origin to size
        $mediaFile = "{$vendor}/{$file}";
        $mediaName = "media/{$mediaFile}";
        $mediaPath = storage_path($mediaName);

        // Check cache image exists
        if (Storage::disk('cache')->exists($cacheFile)) {
            return response()->file($cachePath);
        }

        // Check media image exists
        if (Storage::disk('media')->exists($mediaFile) == false) {
            return Response::make('File not found: ' . $mediaPath, 404);
        }

        // Create cache dir
        Storage::disk('cache')->makeDirectory($cacheDir);

        // Resize image to width
        $image = Image::make($mediaPath);

        // Calculate cache image size
        $ratio = $image->width() / $image->height();

        $newWidth  = hexdec($width);
        $newHeight = hexdec($height);

        $newWidth  = $newWidth > $image->width() ? $image->width() : $newWidth;
        $newWidth  = $newWidth > config("constants.MEDIA_MAX_WIDTH") ? config("constants.MEDIA_MAX_WIDTH") : $newWidth;

        $newHeight = $newHeight > $image->height() ? $image->height() : $newHeight;
        $newHeight = $newHeight > config("constants.MEDIA_MAX_HEIGHT") ? config("constants.MEDIA_MAX_HEIGHT") : $newHeight;

        $newRatio  = $newWidth / $newHeight;

        // Keep full image
        if ($newRatio < $ratio) {
            // Resize to newHeight, crop to newWidth, newHeight
            $image->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        } else {
            // Resize to newWidth, crop to newWidth, newHeight
            $image->resize(null, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        // Save cache image to disk: trans rgba(0, 0, 0, 0)
        $image->resizeCanvas($newWidth, $newHeight, 'center', false, 'ffffff');

        $image->save($cachePath);

        // Response image to client
        return $image->response($image->mime());
    }

    /**
     * Upload media to server
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        // Validate media metadata
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        // Get media file content
        $file = $request->file('file');

        // Make image object
        $image = Image::make($file->getRealPath());

        $width  = $image->width();
        $height = $image->height();

        $resize = false;

        if ($width > config("constants.MEDIA_MAX_WIDTH")) {
            $width = config("constants.MEDIA_MAX_WIDTH");
            $resize = true;
        }

        if ($height > config("constants.MEDIA_MAX_HEIGHT")) {
            $height = config("constants.MEDIA_MAX_HEIGHT");
            $resize = true;
        }

        if ($resize) {
            $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($file->getRealPath());
        }

        // Check vendor param
        $vendor = request()->input('vendor', 'default');

        if (is_numeric($vendor)) {
            $vendor = dechex($vendor);
        }

        // Build media information
        $disk   = 'media';
        $folder = $vendor;
        $name   = md5(uniqid()) . '.' . $file->extension();

        // Check store folder
        Storage::disk($disk)->makeDirectory($folder);

        $path = $file->storeAs(
            $folder,
            $name,
            $disk
        );

        $user = (!empty(Auth::user())) ? Auth::user() : Auth::guard('user')->user();

        // Save media to database
        $media = Media::create([
            'type'  => $image->mime(),
            'name'  => $file->getClientOriginalName(),
            'path'  => $path,
            'ext'   => $file->extension(),
            'vendor' => $vendor,
            'caption' => '',
            'size' => $file->getSize(),
            'width' => $width,
            'height' => $height,
            'status' => 1,
            'createdBy' => $user->id,
            'createdAt' => now(),
            'updatedBy' => $user->id,
            'updatedAt' => now(),
        ]);

        // Build response data
        return [
            'id' => $media->id,
            'name' => $media->name,
            'ext' => $media->ext,
            'width' => $width,
            'heigh' => $height,
            'caption' => $media->caption,
            'src' => $path,
            'link' => image($path),
            'thumb' => thumb($folder . '/' . $name, 200)
        ];
    }
}
