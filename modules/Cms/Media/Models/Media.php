<?php

namespace Modules\Cms\Media\Models;

use App\Model as Eloquent;
use App\Traits\Objectable;

class Media extends Eloquent
{
//    use Objectable;

	protected $connection = 'mysql';
    protected $table = 'media';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',     // Media mime type {image/jpeg, image/png, ...}
        'name',     // Media name
        'path',     // Media relation path
        'ext',      // Media file extension
        'vendor',   // Media vendor
        'caption',  // Media caption
        'size',     // Media file size
        'width',    // Media width
        'height',   // Media height
        'status',   // Integer
        'createdBy',
    ];

    /**
     * The model's default values for embeddeds.
     *
     * @var array
     */
    protected $embeddeds = [
        'id',      // Uuid
        'type',     // Media mime type {image/jpeg, image/png, ...}
        'name',     // Media name
        'path',     // Media relation path
        'width',    // Media width
        'height',   // Media height
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Get cover link
     * @example $user->avatar->src
     * @return string
     */
    public function getSrcAttribute()
    {
        return isset($this->path) ? image($this->path) : '';
    }

    /**
     * Get media original link
     * @example $user->avatar->link
     * @return string
     */
    public function getLinkAttribute()
    {
        return isset($this->path) ? image($this->path) : '';
    }

    /**
     * Get image link
     * @example $user->avatar->image
     * @return string
     */
    public function getImageAttribute()
    {
        return isset($this->path) ? image($this->path) : '';
    }

    /**
     * Get thumb link
     * @example $user->avatar->thumb
     * @return string
     */
    public function getThumbAttribute()
    {
        return isset($this->path) ? thumb($this->path) : '';
    }

    /**
     * Get cache image link
     * @example $user->avatar->cache
     * @return string
     */
    public function getCacheAttribute()
    {
        return isset($this->path) ? thumb($this->path) : '';
    }

}
