<?php

namespace Modules\Cms\Posts\Controllers;

use App\Common\Response;
use App\Repositories\PostsCategoryRepository;
use App\Services\GroupService;
use App\Services\CategoryService;
use App\Services\GroupCategoryService;
use Illuminate\Http\Request;
use View;

class ManageController extends Controller
{
    protected $creatorService;
    protected $postsService;
    protected $categoryService;
    protected $groupCategoryService;
    protected $postsTypeService;
    protected $postsCategoryRepository;

    public function __construct(
        CategoryService $categoryService,
        GroupCategoryService $groupCategoryService,
        PostsCategoryRepository $postsCategoryRepository
    ) {
        $this->categoryService = $categoryService;
        $this->groupCategoryService = $groupCategoryService;
        $this->postsCategoryRepository = $postsCategoryRepository;

        $listCategory = $this->categoryService->getAll(['type' => 'posts']);

        View::share(compact('listCategory'));
    }

    public function index()
    {
        return view('posts::manage.index');
    }

    public function create()
    {
        return view('posts::manage.create');
    }

    public function getGroup(Request $request)
    {
        $param = $request->all();
        $sortPost = $arrayPostsIds = [];
        if (!$param['id']) {
            return;
        }
        $category = $this->categoryService->find($param['id']);
        $listGroupCategory = $this->groupCategoryService->getAll(['category_id' => $category->id]);
        $listPostsCategory = $this->postsCategoryRepository->getAll(['category_id' => $category->id]);
    
        $listPost = $this->listPost($listPostsCategory, $category, $listGroupCategory);

        $listGroup = view('posts::manage.list_group', [
            'listGroupCategory' => $listGroupCategory ?? []
        ])->render();


        $data = [
            'listGroup' => $listGroup,
            'listPost' => $listPost
        ];

        return Response::success('', $data);
    }

    public function saveByChecked(Request $request)
    {
        $param = $request->all();
        if (!$param['id'] && !$param['category']) {
            return;
        }
        $now = date('Y-m-d H:i:s');
        $data[] = [
            'category_id' => $param['category'],
            'post_id' => $param['id'],
            'sort' => $now,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $this->postsCategoryRepository->insert($data);

        $category = $this->categoryService->find($param['category']);
        $listGroupCategory = $this->groupCategoryService->getAll(['category_id' => $category->id]);
        $listPostsCategory = $this->postsCategoryRepository->getAll(['category_id' => $category->id]);
        $listPost = $this->listPost($listPostsCategory, $category, $listGroupCategory);

        $data = [
            'listPost' => $listPost
        ];

        return Response::success('', $data);
    }

    public function changeSortPost(Request $request)
    {
        $param = $request->all();
        if (!$param['id'] && !$param['category']) {
            return;
        }

        $listPostCategory = $this->postsCategoryRepository->changeSortPost($param);
        if ($listPostCategory) {
            $category = $this->categoryService->find($param['category']);
            $listGroupCategory = $this->groupCategoryService->getAll(['category_id' => $category->id]);
            $listPostsCategory = $this->postsCategoryRepository->getAll(['category_id' => $category->id]);
            $listPost = $this->listPost($listPostsCategory, $category, $listGroupCategory);

            $data = [
                'listPost' => $listPost
            ];

            return Response::success('', $data);
        }
    }

    public function deleteByChecked(Request $request)
    {
        $param = $request->all();
        if (!$param['id'] && !$param['category']) {
            return;
        }
        $deleteByChecked = $this->postsCategoryRepository->deleteByChecked($param);

        $category = $this->categoryService->find($param['category']);
        $listGroupCategory = $this->groupCategoryService->getAll(['category_id' => $category->id]);
        $listPostsCategory = $this->postsCategoryRepository->getAll(['category_id' => $category->id]);
        $listPost = $this->listPost($listPostsCategory, $category, $listGroupCategory);

        $data = [
            'listPost' => $listPost
        ];

        return Response::success('', $data);
    }

    public function listPost($listPostsCategory, $category, $listGroupCategory)
    {
        $postsIds = $sortPost = $listCategoryPost = [];
        
        foreach ($listPostsCategory as $key => $item) {
            $postsIds[] = $item['post_id'];
            $sortPost[$item['post_id']] = $item['sort'];
        }
        $listPost = $detailPost = [];
        
        foreach ($listGroupCategory as $key => $groupCategory) {
            if (!empty($groupCategory->posts)) {
                foreach ($groupCategory->posts as $keyGroupPost => $groupPost) {
                    if(!empty($groupPost->post)){
                        $postByCategory[$groupCategory['category_id']][] = $groupPost->post;
                        $listPost[$groupCategory['category_id']][$groupPost->post->id][] = !empty($groupPost->group) ? $groupPost->group : '';
                        $detailPost[$groupPost->post->id] = $groupPost->post->title;
                    }                
                }
            }
        }
        if (!empty($postsIds) && !empty($postByCategory)) {
            foreach ($postsIds as $postId) {
                foreach ($postByCategory as $key => $postCategory) {
                    foreach (array_unique($postCategory) as $keyPost => $post) {
                        if ($postId == $post['id']) {
                            $listCategoryPost[$key][] = $post;
                        }
                    }
                }
            }
        }
        
        return view('posts::manage.list_post', [
            'listGroupCategory' => $listGroupCategory ?? [],
            'category' => $category,
            'postsIds' => $postsIds,
            'sortPost' => $sortPost,
            'listPost' => $listPost,
            'detailPost' => $detailPost,
            'listCategoryPost' => $listCategoryPost,
        ])->render();
    }
}
