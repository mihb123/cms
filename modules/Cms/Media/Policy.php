<?php

namespace Modules\Cms\Media;

use App\Models\Admin;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function view(Admin $admin)
    {
        return $admin->hasPerm('backend.view');
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
}
