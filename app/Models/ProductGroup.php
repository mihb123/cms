<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'product_group';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function category()
    {
        return $this->HasMany(ProductGroupCategory::class, 'product_group_id', 'id');
    }

    public function listCategory()
    {
        return $this->belongsToMany(Category::class, ProductGroupCategory::class, 'product_group_id', 'category_id');
    }
}
