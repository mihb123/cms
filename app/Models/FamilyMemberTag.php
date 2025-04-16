<?php

namespace App\Models;

use App\Model as Eloquent;

class FamilyMemberTag extends Eloquent
{
    protected $connection = 'mysql';
    protected $table = 'family_member_tag';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];
}
