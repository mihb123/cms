<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $connection = 'mysql';
    protected $table = 'menu';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setSiteMapAttribute($value)
    {
        $this->attributes['sitemap'] = json_encode($value);
    }

    public function getSiteMapAttribute($value)
    {
        return json_decode($value, true);
    }   
}
