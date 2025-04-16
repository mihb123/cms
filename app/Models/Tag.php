<?php

namespace App\Models;

use App\Model as Eloquent;

class Tag extends Eloquent
{
    protected $connection = 'mysql';
    protected $table = 'tag';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function tagGroup()
    {
        return $this->HasOne(TagGroup::class, 'tag_id', 'id');
    }

    public function news()
    {
        return $this->HasOne(TagNews::class, 'tag_id', 'id');
    }

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = json_encode($value);
    }

    public function getAvatarAttribute($value)
    {
        return json_decode($value);
    }
}
