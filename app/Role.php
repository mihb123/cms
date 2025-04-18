<?php

namespace App;

use Illuminate\Support\Str;

use App\Model as Eloquent;

class Role extends Eloquent
{
    protected $connection = 'mysql';
    protected $table = 'roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','roles', 'name', 'description', 'level', 'perms', 'status'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'level' => 0,
        'perms' => '{}',
        'status' => 1,
    ];

    /**
     * Get role list permissions module
     * @example $role->groups
     * @return array
     */
    public function getGroupsAttribute()
    {
        $modules = [];
        $columns = [];

        foreach($this->perms as $item) {
            if (Str::contains($item, '.')) {
                list($module, $perm) = explode('.', $item);
                $modules[$module][$perm] = $perm;
                $columns[$perm] = $perm;
            }
        }

        ksort($modules);
        return [
            'modules' => $modules,
            'columns' => $columns,
        ];
    }

    /**
     * Get role list module
     * @example $role->modules
     * @return array
     */
    public function getModulesAttribute()
    {
        $modules = [];

        foreach(json_decode($this->perms) as $item) {
            if (Str::contains($item, '.')) {
                list($module, $perm) = explode('.', $item);
                $modules[$module][$perm] = $perm;
            }
        }

        ksort($modules);

        return $modules;
    }

    /**
     * Get role list unique permissions
     * @example $role->columns
     * @return array
     */
    public function getColumnsAttribute()
    {
        $columns = [];

        foreach(json_decode($this->perms) as $item) {
            if (Str::contains($item, '.')) {
                list($module, $perm) = explode('.', $item);
                $columns[$perm] = $perm;
            }
        }

        return $columns;
    }
}
