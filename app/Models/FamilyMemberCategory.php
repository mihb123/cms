<?php

namespace App\Models;

use App\Model as Eloquent;

class FamilyMemberCategory extends Eloquent
{
    protected $connection = 'mysql';
    protected $table = 'family_member_category';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

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
}
