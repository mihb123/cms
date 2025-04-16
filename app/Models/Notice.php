<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'notice';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $guarded = [];

    protected $casts = [
        'status' => 'int'
    ];

    public function noticeCategory()
    {
        return $this->HasOne(NoticeCategory::class, 'id', 'notice_category_id');
    }
}
