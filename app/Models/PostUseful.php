<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUseful extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'post_useful';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function creator()
    {
        return $this->HasOne(Creator::class, 'id', 'creator_id');
    }


    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = json_encode($value);
    }

    public function getAvatarAttribute($value)
    {
        return json_decode($value);
    }

    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = json_encode($value);
    }

    public function getIconAttribute($value)
    {
        return json_decode($value);
    }

}
