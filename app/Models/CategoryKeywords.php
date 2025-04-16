<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryKeywords extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'category_keywords';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function keyWords()
    {
        return $this->hasOne(KeyWords::class, 'id', 'key_words_id');
    }
}
