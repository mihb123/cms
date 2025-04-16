<?php

namespace Modules\Cms\Posts\Controllers;

use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\PostsTopic\UpdateRequest;
use App\Http\Requests\PostsTopic\CreateRequest;
use App\Services\CreatorService;
use App\Services\PostsTopicService;
use App\Services\TagService;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    protected $creatorService;
    protected $postsTopicService;
    protected $categoryService;

    public function __construct (
        CreatorService $creatorService,
        PostsTopicService $postsTopicService,
        CategoryService $categoryService
    ) {
        $this->creatorService = $creatorService;
        $this->postsTopicService = $postsTopicService;
        $this->categoryService = $categoryService;

        $listCategory = $this->categoryService->getAll(['type' => 'posts-topic']);
        $listCreator = $this->creatorService->getAll();

        View::share(compact('listCreator', 'listCategory'));
    }

    public function index()
    {
        return view('posts::topic.index');
    }

    public function create()
    {
        return view('posts::topic.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->postsTopicService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed'));
    }

    public function edit($id)
    {
        $topic = $this->postsTopicService->find($id);

        return view('posts::topic.edit', compact('topic'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->postsTopicService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->postsTopicService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->postsTopicService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->postsTopicService->changeSort($request);
    }
}
