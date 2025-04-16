<?php

namespace Modules\Cms\Tag\Controllers;

use App\Http\Requests\TagGroup\CreateRequest;
use App\Http\Requests\TagGroup\UpdateRequest;
use App\Services\GroupService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class TagGroupController extends Controller
{
    protected $groupService;

    protected $module = '';

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index()
    {
        return view('tag::group.index');
    }

    public function create()
    {
        return view('tag::group.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->groupService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function edit($id)
    {
        $group = $this->groupService->find($id);

        return view('tag::group.edit', compact('group'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->groupService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->groupService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->groupService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->groupService->changeSort($request);
    }
}
