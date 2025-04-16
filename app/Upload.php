<?php

namespace App;

use App\Traits\Avatarable;
use \Illuminate\Database\Eloquent\SoftDeletes;
use App\Model as Eloquent;

class Upload extends Eloquent
{
    use SoftDeletes;

    use Avatarable;

    protected $connection = 'mysql';
    protected $table = 'upload';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    const STATUS_SUCCESS = 1;
    const STATUS_ERROR = -1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '_id',
        'type',
        'name',
        'ext',
        'size',
        'disk',
        'path',
        'created_at',
        'updated_at',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];


    public function getDetail($option = []) {
        $data = self::query();

        if (isset($option['_id']) && !empty($option['_id'])) {
            $data = $data->where('_id', $option['_id']);
        }

        if (isset($option['status']) && !empty($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }

        return $data = $data->first();
    }


}
