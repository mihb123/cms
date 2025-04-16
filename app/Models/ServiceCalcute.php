<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCalcute extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'service_calculate';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function category() {
        return $this->hasMany(ServiceCategoryPercentage::class, 'service_calculate_id', 'id');
    }
}
