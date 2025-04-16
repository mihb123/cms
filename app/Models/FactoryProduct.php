<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryProduct extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'factory_product';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function factory()
    {
        return $this->HasOne(Factory::class, 'id', 'factory_id');
    }
}
