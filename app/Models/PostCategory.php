<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'post_category';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PUBLIC = 1;
    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id')->where('post.status', self::PUBLIC);
    }


}
