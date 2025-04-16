<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'post';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = json_encode($value);
    }

    public function getAvatarAttribute($value)
    {
        return json_decode($value);
    }

    public function creator()
    {
        return $this->HasOne(Creator::class, 'id', 'creator_id');
    }

    public function getPostType()
    {
        return $this->HasOne(PostType::class, 'id', 'post_type_id');
    }

    public function group()
    {
        // return $this->HasOne(Group::class, 'id', 'group_id');
        return $this->belongsToMany(Group::class, PostGroup::class, 'post_id', 'group_id')->orderBy('post_group.sort','desc');
    }

    public function postGroup()
    {
        return $this->HasMany(PostGroup::class, 'post_id', 'id');
    }
}
