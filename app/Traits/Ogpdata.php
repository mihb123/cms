<?php

namespace App\Traits;
/**
 * Add method to get data ogp
 * @example $obj->ogpTitle
 * @example $obj->ogpDescription
 */
trait Ogpdata
{
    /**
     * Get ogp title
     * @example $node->ogpTitle
     * @return string
     */
    public function getOgpIdAttribute()
    {
        return $this->ogp['_id'] ?? '';
    }


    /**
     * Get ogp title
     * @example $node->ogpTitle
     * @return string
     */
    public function getOgpTitleAttribute()
    {
        return $this->ogp['title'] ?? '';
    }

    /**
     * Get ogp description
     * @example $node->ogpDescription
     * @return string
     */
    public function getOgpDescriptionAttribute()
    {
        return $this->ogp['description'] ?? '';
    }

    /**
     * Get ogp description
     * @example $node->ogpDescription
     * @return string
     */
    public function getOgpImageAttribute()
    {
        return isset($this->ogp['image']['path'])
            ? image($this->ogp['image']['path'])
            : '';
    }
}