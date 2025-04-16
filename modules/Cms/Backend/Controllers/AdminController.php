<?php
namespace Modules\Cms\Backend\Controllers;

use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\PasswordRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Services\AdminService;
use View;
use Auth;
use DB;
use Datatables;
use App\Models\Admin;
use App\Role;
use App\Perm;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $module = '';
    protected $validate;
    protected $listRole;
    protected $adminGetCollection;

    public function __construct(AdminService $adminService)
    {
        $this->module = 'backend';
        $this->adminService = $adminService;
        $this->listRole =  Role::all();
        $this->adminGetCollection =  Admin::getCollection();
        View::share('_module', $this->module);
    }

    public function index()
    {
        $count = Admin::count();
        return view('backend::admin.index', compact('count'));
    }

    public function create()
    {
        return view('backend::admin.create', [
            'roles' => $this->listRole,
            'collection' => $this->adminGetCollection,
        ]);
    }
    public function show(Admin $admin)
    {
        return view('backend::admin.show', [
            'node' => $admin,
            'roles' => Perm::modules(),
            'collection' => $this->adminGetCollection,
            'user'      => Auth::user(),
        ]);
    }
    public function store (CreateRequest $request) {
        $created = $this->adminService->create($request);
        return redirect()
            ->route('admin.index')
            ->with('success', __($this->module .'::messages.action.update_success'));
    }

    public function edit(Admin $admin)
    {
        return view('backend::admin.edit', [
            'node' => $admin,
            'roles' => $this->listRole,
            'collection' => $this->adminGetCollection,
        ]);
    }

    public function update(UpdateRequest $request, Admin $admin)
    {
        $data = $request->all();
        $update = $this->adminService->update($data,$admin);
        return redirect()
            ->route('admin.index')
            ->with('success', __($this->module .'::messages.action.update_success'));
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()
            ->route('admin.index')
            ->with('success', __($this->module .'::messages.action.delete_success'));
    }

    public function password(PasswordRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->adminService->updatePassword($data,$id);
        return redirect()->route('admin.index')->with('success', __($this->module .'::messages.action.change_pass_success'));
    }

    public function ajax(Request $request)
    {
        return $this->adminService->getAjax($request);
    }
}
