<?php

namespace Modules\Cms\Calculate\Controllers;

use App\Http\Requests\CalculateCategory\CreateRequest;
use App\Http\Requests\CalculateCategory\UpdateRequest;
use App\Services\GroupService;
use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $groupService;
    protected $module = '';

    public function __construct(
        CategoryService $categoryService,
        GroupService $groupService
    ) {
        $this->categoryService = $categoryService;
        $this->groupService = $groupService;

        $listGroup = $this->groupService->getAll(['type' => 'calculate']);
        View::share(compact('listGroup'));
    }

    public function index()
    {
        return view('calculate::category.index');
    }

    public function create()
    {
        return view('calculate::category.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'calculate';
        $result = $this->categoryService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('calculate::messages.success'));
        }
        return redirect()->back()->withErrors(__('calculate::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->categoryService->find($id);
        $groupIds = [];
        if (isset($data->groupCalculate) && $data->groupCalculate) {
            foreach ($data->groupCalculate as $key => $value) {
                $groupIds[] = $value['group_id'];
            }
        }
        return view('calculate::category.edit', compact('data', 'groupIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'calculate';
        $result = $this->categoryService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('calculate::messages.success'));
        }
        return redirect()->back()->withErrors(__('calculate::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->categoryService->getAjaxPost($request, 'calculate', 'calculate-category');
    }

    public function changeSort(Request $request)
    {
        return $this->categoryService->changeSort($request);
    }
}
