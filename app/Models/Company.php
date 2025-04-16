<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'company';

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

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }

    public function category()
    {
        return $this->HasMany(CompanyCategory::class, 'company_id', 'id');
    }

    public function service()
    {
        return $this->HasMany(CompanyService::class, 'company_id', 'id');
    }

    public function listService()
    {
        return $this->belongsToMany(Service::class, CompanyService::class, 'company_id', 'service_id');
    }

    public function CompanyPagination($page, $perPage)
    {
        return $this->belongsToMany(ProductNews::class, ProductNewsCategory::class, 'category_id', 'product_news_id')
            ->orderBy('product_news.sort', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function productOption()
    {
        return $this->HasMany(ProductOption::class, 'company_id', 'id');
    }
}
