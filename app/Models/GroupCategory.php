<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCategory extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'group_category';
    const PUBLIC = 1;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function listTag()
    {
        return $this->hasMany(TagGroup::class, 'group_id', 'group_id')->orderBy('sort', 'desc');
    }

    public function listPost()
    {
        return $this->hasMany(Post::class, 'group_id', 'group_id')
            ->where('type', self::PUBLIC)
            ->where('status', self::PUBLIC)
            ->limit(10)
            ->orderBy('sort', 'desc');
    }

    public function posts()
    {
        return $this->hasMany(PostGroup::class, 'group_id', 'group_id')->orderBy('sort', 'desc');
    }

    // public function posts() {
    //     return $this->belongsToMany(Post::class, PostGroup::class, 'group_id', 'post_id','group_id')->orderBy('sort','desc');
    // }

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id')->where('status', self::PUBLIC);
    }

    public function keyWords()
    {
        return $this->belongsToMany(KeyWords::class, GroupKeyWords::class, 'group_id', 'key_words_id', 'group_id')->where('key_words.status', self::PUBLIC);
    }
}
