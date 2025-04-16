<?php

namespace Modules\Cms\Calculate\Controllers;

use App\Http\Requests\ServiceGroup\CreateRequest;
use App\Http\Requests\ServiceGroup\UpdateRequest;
use App\Services\CategoryService;
use App\Services\GroupService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class GroupServiceController extends Controller
{
    protected $groupService;
    protected $categoryService;

    protected $module = '';

    public function __construct(
        GroupService $groupService,
        CategoryService $categoryService
    ) {
        $this->groupService = $groupService;
        $this->categoryService = $categoryService;

        $listCategory = $this->categoryService->getAll(['type' => 'calculate']);
        View::share(compact('listCategory'));
    }

    public function index()
    {
        return view('calculate::group_service.index');
    }

    public function create()
    {
        return view('calculate::group_service.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'calculate-service';
        $result = $this->groupService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function edit($id)
    {
        $group = $this->groupService->find($id);
        $categoryIds = [];
        if(!empty($group->serviceCategory)) {
            foreach ($group->serviceCategory as $key => $groupService) {
                $categoryIds[] = $groupService->category_id;
            }
        }
        return view('calculate::group_service.edit', compact('group', 'categoryIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'calculate-service';
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
        return $this->groupService->getAjaxCalculateService($request);
    }

    public function changeSort(Request $request)
    {
        return $this->groupService->changeSort($request);
    }
}
