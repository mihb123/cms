<?php

namespace Modules\Cms\Posts\Controllers;

use App\Services\GroupService;
use App\Services\PostsTypeService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Requests\Posts\CreateRequest;
use App\Services\CategoryService;
use App\Services\CreatorService;
use App\Services\PostsService;
use App\Services\TagService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $creatorService;
    protected $postsService;
    protected $categoryService;
    protected $groupService;
    protected $postsTypeService;

    public function __construct(
        CreatorService $creatorService,
        PostsService $postsService,
        PostsTypeService $postsTypeService,
        CategoryService $categoryService,
        GroupService $groupService
    ) {
        $this->creatorService = $creatorService;
        $this->postsService = $postsService;
        $this->categoryService = $categoryService;
        $this->groupService = $groupService;
        $this->postsTypeService = $postsTypeService;

        $listCreator = $this->creatorService->getAll();
        $listCategory = $this->categoryService->getAll(['type' => 'posts']);
        $listGroup = $this->groupService->getAll(['type' => 'posts']);
        $listPostsType = $this->postsTypeService->getAll();
        View::share(compact('listCreator', 'listCategory', 'listGroup', 'listPostsType'));
    }

    public function index()
    {
        return view('posts::index');
    }

    public function create()
    {
        return view('posts::create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();

        $result = $this->postsService->create($data);
        if ($result) {
            return redirect()->route('posts.edit', [$result->id]);
        }
        return redirect()->back()->withErrors(__('posts::messages.failed'));
    }

    public function edit($id)
    {
        $post = $this->postsService->find($id);
        $groupIds = [];
        if(isset($post->postGroup) && $post->postGroup) {
            foreach ($post->postGroup as $key => $value) {
                $groupIds[] = $value['group_id'];
            }
        }
        return view('posts::edit', compact('post', 'groupIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->postsService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->postsService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->postsService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->postsService->changeSort($request);
    }

    public function displayTop(Request $request)
    {
        return $this->postsService->displayTop($request);
    }
}
