<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PercentageBurdenCategory extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'percentage_burden_category';
    const PUBLIC = 1;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function percentage()
    {
        return $this->hasOne(PercentageBurden::class, 'id', 'percentage_burden_id');
    }
}
