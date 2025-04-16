<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagGroup extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tag_group';
    const PUBLIC = 1;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function tag() {
        return $this->hasOne(Tag::class, 'id', 'tag_id')->where('status', self::PUBLIC);
    }

    public function group() {
        return $this->hasOne(Group::class, 'id', 'group_id')->where('status', self::PUBLIC);
    }
}
