<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalculateGroup extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'calculate_group';
    const PUBLIC = 1;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function group() {
        return $this->hasOne(Group::class, 'id', 'group_id')->where('status', self::PUBLIC);
    }
}
