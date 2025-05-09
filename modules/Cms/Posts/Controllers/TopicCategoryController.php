<?php

namespace Modules\Cms\Posts\Controllers;

use App\Http\Requests\PostsTopicCategory\CreateRequest;
use App\Http\Requests\PostsTopicCategory\UpdateRequest;
use App\Services\GroupService;
use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class TopicCategoryController extends Controller
{
    protected $categoryService;
    protected $module = '';

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('posts::category_topic.index');
    }

    public function create()
    {
        return view('posts::category_topic.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'posts-topic';
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
        return view('posts::category_topic.edit', compact('data', 'groupIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'posts-topic';
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
        return $this->categoryService->getAjaxPost($request, 'posts-topic', 'posts-topic-category');
    }

    public function changeSort(Request $request)
    {
        return $this->categoryService->changeSort($request);
    }
}
