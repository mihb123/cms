<?php
namespace App\Services;
use App\Repositories\RoleRepositoty;

class RoleService
{
    protected $roleRepositoty;

    public function __construct(RoleRepositoty $roleRepositoty)
    {
        $this->roleRepositoty = $roleRepositoty;
    }

    public function find($id)
    {
        return $this->roleRepositoty->find($id);
    }

    public function detail($id)
    {
        return $this->roleRepositoty->detail($id);
    }

    public function getAll()
    {
        return $this->roleRepositoty->getAll();
    }

    public function create($request)
    {
        $attributes = [
            'roles' => $request['roles'] ?? [],
            'name' => $request['name'] ?? [],
            'description' => $request['description'] ?? [],
            'status' => intval($request['status']),
            'level' => intval($request['level']) ?? '',
        ];

        return $this->roleRepositoty->create($attributes);
    }

    public function update($request, $admin)
    {
        $attributes = [];
        if ($request->has('perms')) {
            $bucket = [];
            foreach($request->input('perms', []) as $module => $perms) {
                foreach($perms as $perm => $value) {
                    $bucket[] = "{$module}.{$perm}";
                }
            }
            $attributes = ['perms' => $bucket];
        } else {
            $attributes = [
                'name' => $request['name'] ?? [],
                'description' => $request['description'] ?? [],
                'status' => intval($request['status']),
                'level' => intval($request['level']) ?? '',
            ];
        }

        return $this->roleRepositoty->update($admin, $attributes);
    }

}
