<?php

namespace App\Models;

use App\Repositories\ProductNewsRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'product_option';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];


    public function category()
    {
        return $this->HasOne(Category::class, 'id', 'category_id');
    }

    public function product()
    {
        return $this->HasOne(Product::class, 'id', 'product_id');
    }

    public function company()
    {
        return $this->HasOne(Company::class, 'id', 'company_id');
    }
}
