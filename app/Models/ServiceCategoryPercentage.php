<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategoryPercentage extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'service_category_percentage';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PUBLIC = 1;

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function service()
    {
        return $this->hasOne(ServiceCalcute::class, 'id', 'service_calculate_id')->where('status', self::PUBLIC);
    }

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id')->where('status', self::PUBLIC);
    }

}
