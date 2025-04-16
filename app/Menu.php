<?php

namespace App;

use App\Traits\Coverable;
use App\Traits\Avatarable;
use App\Traits\Guidable;
use App\Traits\Objectable;
use App\Traits\Thumbable;

use App\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    use Objectable;
    use Thumbable;
    use Coverable;


    protected $connection = 'mysql';
    protected $table = 'menu';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    const TYPE_ITEM = 0;
    const TYPE_TREE = 1;
    const TYPE_PARENT="0";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '_id',
        'slug',
        'name',
        'type',
        'icon',
        'can',
        'parent_id',
        'unit_deploy_id',
        'description',
        'sort',
        'status',
        'thumb',
        'cover',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function getAllMenuParent($option = []){
        $data = self::query();
        if(isset($option['parent_id'])){
            $data = $data->where('parent_id', $option['parent_id']);
        }
        if (isset($option['unit_deploy_id'])) {
            $data = $data->where('unit_deploy_id', $option['unit_deploy_id']);
        }
        if(isset($option['slug'])){
            $data = $data->where('slug', $option['slug']);
        }
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        return $data = $data
            ->orderBy('sort','asc')
            ->with('children')
            ->get()
            ->toArray();
    }
    public function parent()
    {
        return $this->hasMany(Menu::class)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'asc');
    }
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->with('children')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'asc');
    }

    public function getAllByOption($option = []) {
        $data = self::query();
        if (isset($option['inIds'])) {
            $data = $data->whereIn('_id', $option['inIds']);
        }
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        if (isset($option['unit_deploy_id'])) {
            $data = $data->where('unit_deploy_id', $option['unit_deploy_id']);
        }
        if (isset($option['parent_id'])) {
            $data = $data->where('parent_id', $option['parent_id']);
        }
        return $data = $data
            ->orderBy('sort','asc')
            ->orderBy('updated_at','desc')
            ->get();
    }



    public function getDetail($option = null){
        $detail = self::query();
        if (isset($option['_id']) && !empty($option['_id'])){
            $detail = $detail->where('_id', $option['_id']);
        }

        if (isset($option['status']) && !empty($option['status'])){
            $detail = $detail->where('status', $option['status']);
        }
        if (isset($option['slug']) && !empty($option['slug'])){
            $detail = $detail->where('slug', $option['slug']);
        }

        if (isset($option['code']) && !empty($option['code'])){
            $detail = $detail->where('status', $option['code']);
        }
        if (isset($option['unit_deploy_id'])) {
            $detail = $detail->where('unit_deploy_id', $option['unit_deploy_id']);
        }
        if (isset($option['slug'])) {
            $detail = $detail->where('slug', $option['slug']);
        }
        if (isset($option['parent_id'])) {
            $detail = $detail->where('parent_id', $option['parent_id']);
        }

        $detail = $detail->first();
        return $detail;
    }

    public static function getCollection($bucket = null)
    {
        $collection = [
            'status' => [
                config("constants.status_verified") => __('menu::messages.active'),
                config("constants.status_draft")  => __('menu::messages.unactive')
            ],
            'type' => [
                Menu::TYPE_ITEM => __('menu::messages.item'),
                Menu::TYPE_TREE => __('menu::messages.tree'),
            ],
        ];

        return $collection[$bucket] ?? $collection;
    }

}
