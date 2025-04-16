<?php

namespace App\Models;

use App\Repositories\ProductNewsRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNews extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'product_news';

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

    public function category()
    {
        return $this->HasOne(ProductNewsCategory::class, 'product_news_id', 'id');
    }
}
