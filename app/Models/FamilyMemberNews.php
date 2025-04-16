<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMemberNews extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'family_member_news';

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

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }

    public function tag()
    {
        return $this->HasOne(FamilyMemberTag::class, 'id', 'tag_id');
    }
    
    public function familyMember()
    {
        return $this->HasOne(FamilyMember::class, 'id', 'family_member_id');
    }

}

