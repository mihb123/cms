<?php

namespace Modules\Cms\Backend\Policies;

use App\Models\Admin;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function view(Admin $admin)
    {
        return $admin->hasPerm('backend.view');
    }

    public function admin(Admin $admin)
    {
        return $admin->hasPerm('backend.admin');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPerm('backend.create');
    }

    public function update(Admin $admin)
    {
        return $admin->hasPerm('backend.update');
    }

    public function delete(Admin $admin)
    {
        return $admin->hasPerm('backend.delete');
    }

    public function publish(Admin $admin)
    {
        return $admin->hasPerm('backend.publish');
    }

    public function draft(Admin $admin)
    {
        return $admin->hasPerm('backend.draft');
    }
    public function password(Admin $admin)
    {
        return $admin->hasPerm('admin.password');
    }
}
