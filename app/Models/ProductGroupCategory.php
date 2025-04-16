<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroupCategory extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'product_group_category';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];
}
