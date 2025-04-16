<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PercentageBurden extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'percentage_burden';
    const PUBLIC = 1;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function category()
    {
        return $this->hasMany(PercentageBurdenCategory::class, 'percentage_burden_id', 'id');
    }
}
