<?php

namespace App\Models;

use App\Model as Eloquent;

class FamilyMemberTagGroup extends Eloquent
{
    protected $connection = 'mysql';
    protected $table = 'family_member_tag_group';
    const PUBLIC = 1;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function listTag()
    {
        return $this->hasMany(FamilyMemberTag::class, 'tag_group_family_member_id', 'id')->where('status', self::PUBLIC);
    }
}
