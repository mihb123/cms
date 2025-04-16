<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationGuide extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'destination_guide';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const PUBLIC = 1;

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

    // public function setDescriptionAttribute($value)
    // {
    //     $this->attributes['description'] = json_encode($value);
    // }

    // public function getDescriptionAttribute($value)
    // {
    //     return json_decode($value, true);
    // }
}
