<?php

namespace Modules\Cms\Backend\Policies;

use App\Models\Admin;

use Illuminate\Auth\Access\HandlesAuthorization;

class PermPolicy
{
    use HandlesAuthorization;

    public function view(Admin $admin)
    {
        return $admin->has('admin.view');
    }

    public function create(Admin $admin)
    {
        return $admin->has('admin.create');
    }

    public function update(Admin $admin)
    {
        return $admin->has('admin.update');
    }

    public function delete(Admin $admin)
    {
        return $admin->has('admin.delete');
    }
}
