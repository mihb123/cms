<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagNews extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tag_news';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }

    public function creator()
    {
        return $this->HasOne(Creator::class, 'id', 'creator_id');
    }

    public function tag()
    {
        return $this->HasOne(Tag::class, 'id', 'tag_id');
    }
}
