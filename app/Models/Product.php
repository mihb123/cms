<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'product';

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

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = json_encode($value);
    }

    public function getAvatarAttribute($value)
    {
        return json_decode($value);
    }

    public function setImageSliderAttribute($value)
    {
        $this->attributes['image_slider'] = json_encode($value);
    }

    public function getImageSliderAttribute($value)
    {
        return json_decode($value);
    }

    public function category()
    {
        return $this->HasOne(ProductCategory::class, 'product_id', 'id');
    }

    public function productCategory()
    {
        return $this->HasOne(ProductCategory::class, 'product_id', 'id');
    }

    public function factory()
    {
        return $this->HasOne(FactoryProduct::class, 'product_id', 'id');
    }

    public function factoryProduct()
    {
        return $this->HasOne(FactoryProduct::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, ProductCategory::class, 'product_id', 'category_id');
    }

    public function keyWords()
    {
        return $this->hasMany(ProductKeywords::class, 'product_id', 'id');
    }
}
