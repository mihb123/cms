<?php

namespace Modules\Cms\Backend\Controllers;

use App\Http\Requests\Role\CreateRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Perm;
use App\Role;

use App\Services\RoleService;

/**
 * Handle role requests
 * @package Modules\Backend
 */
class RoleController extends Controller
{
    protected $actions = true;
    protected $roleService ;
    protected $name = 'roles';
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
        $this->middleware('auth');
    }

    public function index()
    {
        $results = $this->roleService->getAll();

        return view('backend::roles.index', compact('results'));
    }

    public function create()
    {
        return view('backend::roles.create');
    }

    public function store(CreateRequest $request)
    {
        $created = $this->roleService->create($request);
        return redirect()
            ->route('roles.index')
            ->with('success','Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('backend::roles.edit', [
            'result' => $role,
            'roles' => Perm::modules(),
        ]);
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $update = $this->roleService->update($request,$role);
        return redirect()
            ->route('roles.index')
            ->with('success','Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()
            ->route('roles.index')
            ->with('success','Role deleted successfully');
    }
}
