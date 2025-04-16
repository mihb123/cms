<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'family_member';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = json_encode($value);
    }

    public function getAvatarAttribute($value)
    {
        return json_decode($value);
    }

    public function news()
    {
        return $this->HasOne(FamilyMemberNews::class, 'family_member_id', 'id');
    }
}
