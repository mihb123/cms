<?php

namespace Modules\Cms\Tag\Controllers;

use App\Http\Requests\TagCategory\CreateRequest;
use App\Http\Requests\TagCategory\UpdateRequest;
use App\Models\TagCategory;
use App\Services\GroupService;
use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class TagGroupCategoryController extends Controller
{
    protected $categoryService;
    protected $groupService;
    protected $module = '';

    public function __construct(CategoryService $categoryService, GroupService $groupService)
    {
        $this->categoryService = $categoryService;
        $this->groupService = $groupService;
    }

    public function index()
    {
        return view('tag::category.index');
    }

    public function create()
    {
        $listGroup = $this->groupService->getAll();
        return view('tag::category.create', compact('listGroup'));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->categoryService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->categoryService->find($id);
        $groupIds = [];
        if(isset($data->groupTag) && $data->groupTag) {
            foreach ($data->groupTag as $key => $value) {
                $groupIds[] = $value['group_id'];
            }
        }
        $listGroup = $this->groupService->getAll();

        return view('tag::category.edit', compact('data', 'listGroup', 'groupIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->categoryService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->categoryService->getAjaxTag($request);
    }

    public function changeSort(Request $request)
    {
        return $this->categoryService->changeSort($request);
    }
}
