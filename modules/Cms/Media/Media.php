<?php

namespace Modules\Cms\Media;

use View;
use Exception;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

/**
 * Empty image when not found here
 */
class Media
{
    /**
     * Load media resources
     */
    protected $loaded = false;

    /**
     * Generate a media upload widget
     *
     * @example Media::widget('button', ['vendor' => '1234'])
     * @example @upload('button', ['vendor' => '1234'])
     *
     * @param $mode button|wide
     * @param $data Data to generate button ['vendor' => '']
     * @return string widget html content
     */
    public function widget($data = [])
    {
        /**
         * Add widget resource loaded status
         */
        $data['loaded'] = $this->loaded;
        $data['type']   = $data['type'] ?? 'image';
        $data['name']   = $data['name'] ?? 'image';
        $data['thumb']  = $data['thumb'] ?? '';
        $data['value']  = $data['value'] ?? '';
        $data['vendor'] = $data['vendor'] ?? 'default';
        
        $view = isset($data['multiple']) ? 'multiple' : 'button';
        $view = View::make("media::{$view}", $data);

        return $view->render();
    }

    /**
     * Get absolute url
     * @param string|null $path
     * @param int|null $width
     * @param int|null $height
     * @param string $action
     * @return string
     */
    public static function image(string $path = null, int $width = null, int $height = null): string
    {
        return url('media/' . $path);
    }

    public static function thumb(string $path = null, int $width = 200, int $height = null)
    {
        // Check for empty path
        if ($path == null) {
            return 'data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=';
        }
        // Check for empty image
        if ($width == null && $height == null) {
            return 'data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=';
        }

        $prefix = dechex($width);

        if ($height != null) {
            $prefix = $prefix . '/' . dechex($height);
        }

        return url('cache/' . $prefix . '/' . $path);
    }
}
