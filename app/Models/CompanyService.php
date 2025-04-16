<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyService extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'company_service';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PUBLIC = 1;

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function service()
    {
        return $this->HasOne(Company::class, 'id', 'company_id')->where('status', self::PUBLIC);
    }
}
