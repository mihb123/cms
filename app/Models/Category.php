<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'category';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function groupTag()
    {
        return $this->hasMany(GroupCategory::class, 'category_id', 'id')
            ->where('type', 'tag')
            ->orderBy('sort', 'desc');
    }

    public function groupPosts()
    {
        return $this->hasMany(GroupCategory::class, 'category_id', 'id')
            ->where('type', 'posts')
            ->orderBy('sort', 'desc');
    }

    public function groupKeyWords()
    {
        return $this->hasMany(GroupCategory::class, 'category_id', 'id')
            ->where('type', 'key_words')
            ->orderBy('sort', 'desc');
    }

    public function keyWords()
    {
        return $this->hasMany(CategoryKeywords::class, 'category_id', 'id');
    }

    public function groupCalculate()
    {
        return $this->hasMany(GroupCategory::class, 'category_id', 'id')
            ->where('type', 'calculate')
            ->orderBy('sort', 'desc');
    }

    public function listPost()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = json_encode($value);
    }

    public function getAvatarAttribute($value)
    {
        return json_decode($value);
    }
    public function setAvatarSPAttribute($value)
    {
        $this->attributes['avatar_sp'] = json_encode($value);
    }

    public function getAvatarSPAttribute($value)
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

    public function productNews($page = 1, $perPage = 10)
    {
        return $this->belongsToMany(ProductNews::class, ProductNewsCategory::class, 'category_id', 'product_news_id')
            ->orderBy('product_news.sort', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function productNewsPagination($page, $perPage)
    {
        return $this->belongsToMany(ProductNews::class, ProductNewsCategory::class, 'category_id', 'product_news_id')
            ->orderBy('product_news.sort', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function productPagination()
    {
        return $this->belongsToMany(Product::class, ProductCategory::class, 'category_id', 'product_id')
            ->orderBy('product.sort', 'desc');
    }

    public function listProduct()
    {
        return $this->belongsToMany(Product::class, ProductCategory::class, 'category_id', 'product_id');
    }

    public function listCompany()
    {
        return $this->belongsToMany(Company::class, CompanyCategory::class, 'category_id', 'company_id');
    }

    public function postCategory()
    {
        return $this->hasMany(PostCategory::class, 'category_id', 'id')->orderBy('post_category.sort', 'desc');
    }

    public function destinationGuide()
    {
        return $this->hasOne(DestinationGuide::class, 'id', 'destination_guide_id');
    }
}
