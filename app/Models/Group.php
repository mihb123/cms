<?php

namespace App\Models;

use finfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'group';
    const PUBLIC = 1;
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

    public function tag()
    {
        return $this->HasMany(TagGroup::class, 'group_id', 'id');
    }

    public function listPost()
    {
        return $this->hasMany(Post::class, 'group_id', 'id')->orderBy('sort', 'desc');
    }

    public function groupPost()
    {
        return $this->hasMany(PostGroup::class, 'group_id', 'id')->orderBy('sort', 'desc');
    }

    public function calculate()
    {
        return $this->HasOne(CalculateGroup::class, 'group_id', 'id');
    }

    public function categoryCalculate()
    {
        return $this->belongsToMany(Category::class, GroupCategory::class, 'group_id', 'category_id')
        ->where('group_category.type', 'calculate')
        ->where('category.type', 'calculate')
        ->where('category.status', self::PUBLIC)
        ->orderBy('category.sort', 'desc');
    }

    public function serviceCategory()
    {
        return $this->HasMany(ServiceGroupCategory::class, 'group_id', 'id');
    }

    public function keyWord()
    {
        return $this->belongsToMany(KeyWords::class, GroupKeyWords::class, 'group_id', 'key_words_id');
    }
}
