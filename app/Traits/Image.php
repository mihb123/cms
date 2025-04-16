<?php

namespace App\Traits;

/**
 * Add method to get avatar link
 * @example $obj->thumbImage
 * @example $obj->thumbLink
 * @example $obj->thumbCache
 */
trait Image
{
    /**
     * Add embedded media thumb object
     * @example $product->thumb->thumb
     * @example $product->thumb->link
     */
    public function image()
    {
        return $this->embedsOne('Modules\Cms\Media\Models\Media');
    }
}