<?php

/*
|--------------------------------------------------------------------------
| Media module helper functions
|--------------------------------------------------------------------------
|
| Regiser more helper function for support print media with size, crop, ...
|
*/

/**
 * Generate image url with $width or $height
 *
 * @example image('media/123/456.jpg', 200)       -> image link resize to width
 * @example image('media/123/456.jpg', 200, 200)  -> image link resize to width, height
 *
 * @example <img src="{{ image($node->thumb['src']) }}" />
 *
 * @param  string  $path
 * @param  mixed   $width
 * @param  mixed   $height
 * @return string
 */
function image($path = null, $width = null, $height = null)
{
    return Media::image($path, $width ?? 200, $height);
}

/**
 * Generate image thumb url with $width or $height
 *
 * @example thumb('media/123/456.jpg', 200)       -> image link resize to width
 * @example thumb('media/123/456.jpg', 200, 200)  -> image link resize to width, height
 *
 * @example <img src="{{ thumb($node->thumb['src']) }}" />
 *
 * @param  string  $path
 * @param  mixed   $width
 * @param  mixed   $height
 * @return string
 */
function thumb($path = null, $width = null, $height = null)
{
    return Media::thumb($path, $width ?? 200, $height);
}

function get_image_url($fileId){
    if ($fileId instanceof \Modules\Cms\Media\Models\Media) {
        $file = $fileId;
    } else {
        if (isset($fileId->id)) {
            $file = \Modules\Cms\Media\Models\Media::query()->where('id', $fileId->id)->first();
        } else {
            $file = \Modules\Cms\Media\Models\Media::query()->where('id', $fileId)->first();
        }

    }

    if (empty($file)) {
        return false;
    }else{
        return $file->thumb;
    }
}
