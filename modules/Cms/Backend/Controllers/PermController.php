<?php

namespace Modules\Cms\Backend\Controllers;

use App\Perm;
use App\Http\Requests;

use Illuminate\Http\Request;

class PermController extends Controller
{
    protected $name = 'perms';

    public function __construct(){}

    public function index()
    {
        return view('backend::perms.index', ['roles' => Perm::modules()]);
    }

    public function create()
    {
        return view('backend::perms.create');
    }

    public function store(Request $request)
    {
        return redirect()->route(config('backend.route') . '.user.index')->with('success','User created successfully.');
    }

    public function show($account)
    {
        return view('backend::perms.show', compact('account'));
    }

    public function edit($account)
    {
        return view('backend::perms.edit', compact('account'));
    }

    public function update(Request $request, $account)
    {
        return redirect()
            ->route(config('backend.route') . '.users.index')
            ->with('success','User updated successfully');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()
            ->route(config('backend.route') . 'users.index')
            ->with('success','User deleted successfully');
    }
}
