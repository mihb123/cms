<?php

namespace Modules\Cms\Posts\Controllers;

use App\Http\Requests\PostsCategory\CreateRequest;
use App\Http\Requests\PostsCategory\UpdateRequest;
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

    public function __construct(CategoryService $categoryService, GroupService $groupService)
    {
        $this->categoryService = $categoryService;
        $this->groupService = $groupService;
        $listGroup = $this->groupService->getAll(['type' => 'posts']);
        View::share(compact('listGroup'));
    }

    public function index()
    {
        return view('posts::category.index');
    }

    public function create()
    {
        return view('posts::category.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'posts';
        $result = $this->categoryService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->categoryService->find($id);
        $groupIds = [];
        if(isset($data->groupPosts) && $data->groupPosts) {
            foreach ($data->groupPosts as $key => $value) {
                $groupIds[] = $value['group_id'];
            }
        }
        return view('posts::category.edit', compact('data', 'groupIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'posts';
        $result = $this->categoryService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->categoryService->getAjaxPost($request, 'posts', 'posts-category');
    }

    public function changeSort(Request $request)
    {
        return $this->categoryService->changeSort($request);
    }
}
