<?php

namespace Modules\Cms\Posts\Controllers;

use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\PostsUseful\UpdateRequest;
use App\Http\Requests\PostsUseful\CreateRequest;
use App\Services\CreatorService;
use App\Services\PostUsefulService;
use Illuminate\Http\Request;

class UsefulController extends Controller
{
    protected $creatorService;
    protected $postUsefulService;
    protected $categoryService;

    public function __construct (
        CreatorService $creatorService,
        PostUsefulService $postUsefulService,
        CategoryService $categoryService
    ) {
        $this->creatorService = $creatorService;
        $this->postUsefulService = $postUsefulService;
        $this->categoryService = $categoryService;
        $listCreator = $this->creatorService->getAll();
        $listCategory = $this->categoryService->getAll(['type' => 'posts-useful']);
        View::share(compact('listCreator', 'listCategory'));
    }

    public function index()
    {
        return view('posts::useful.index');
    }

    public function create()
    {
        return view('posts::useful.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->postUsefulService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed'));
    }

    public function edit($id)
    {
        $useful = $this->postUsefulService->find($id);

        return view('posts::useful.edit', compact('useful'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->postUsefulService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->postUsefulService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->postUsefulService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->postUsefulService->changeSort($request);
    }
}
