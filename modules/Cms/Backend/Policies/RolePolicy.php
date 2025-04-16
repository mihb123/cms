<?php

namespace Modules\Cms\Backend\Policies;

use App\Models\Admin;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function view(Admin $admin)
    {
        return $admin->has('admin');
    }

    public function create(Admin $admin)
    {
        return $admin->has('admin');
    }

    public function update(Admin $admin)
    {
        return $admin->has('admin');
    }

    public function delete(Admin $admin)
    {
        return $admin->has('admin');
    }
}
