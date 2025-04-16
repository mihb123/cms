<?php

namespace Modules\Frontend\Posts\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostGroupRepository;
use App\Repositories\ProductGroupRepository;
use App\Services\GroupService;
use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\PostsService;
use App\Services\PostsTopicService;
use App\Services\SiteMapManageService;
use App\Services\TagService;
use App\Services\PostUsefulService;
use Illuminate\Http\Request;
use View;

//ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostsController extends Controller
{
    protected $module = '';
    protected $tagService;
    protected $topicUsefulService;
    protected $menuService;
    protected $noticeService;
    protected $siteMapManageService;
    protected $categoryRepository;
    protected $postsService;
    protected $groupService;
    protected $postUsefulService;
    protected $postsTopicService;
    protected $postGroupRepository;
    protected $productGroupRepository;
    
    //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
    const PUBLIC = 1;   //1: 公開ステータス
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostUsefulService $postUsefulService,
        MenuService $menuService,
        NoticeService $noticeService,
        SiteMapManageService $siteMapManageService,
        CategoryRepository $categoryRepository,
        PostsService $postsService,
        GroupService $groupService,
        PostsTopicService $postsTopicService,
        PostGroupRepository $postGroupRepository,
        ProductGroupRepository $productGroupRepository
    ) {
        $this->module = 'post-frontend';
        $this->postUsefulService = $postUsefulService;
        $this->menuService = $menuService;
        $this->noticeService = $noticeService;
        $this->categoryRepository = $categoryRepository;
        $this->siteMapManageService = $siteMapManageService;
        $this->postsService = $postsService;
        $this->groupService = $groupService;
        $this->postsTopicService = $postsTopicService;
        $this->postGroupRepository = $postGroupRepository;
        $this->productGroupRepository = $productGroupRepository;

        $secondOpinion = 'true';
        $listNotice = $this->init()['listNotice'];
        $listMenu = $this->init()['listMenu'];
        $listUseful = $this->init()['listUseful'];
        $listSiteMap = $this->siteMapManageService->general();
        $optionTopic = [
            'limit' => 4
        ];
        $listTopic = $this->postsTopicService->getAll(['position' => 1]);

        $home = 'cms1';
        $posts = 'true';

        view::share('_module', $this->module);
        view::share(compact(
            'secondOpinion',
            'listNotice',
            'home',
            'listMenu',
            'listSiteMap',
            'listUseful',
            'posts',
            'listTopic'
        ));
    }

    public function list($id)
    {

        return view($this->module . '::list', $this->getCategory($id));
    }

    public function search($id, Request $request)
    {
        $group = $this->groupService->find($id);
        
        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($group['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }

        $param = $request->all();
        $category = [];
        if (isset($param['category'])) {
            $category =  $this->getCategory($param['category'], $group);
        }
        return view($this->module . '::list', $category, compact('group'));
    }

    public function getCategory($id, $group = null)
    {
        $category = $this->categoryRepository->find($id);

        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($category['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }

        $listUseful = $this->postUsefulService->getAll();

        $ids = $listGroup = $listPost = [];

        if ($group) {
            // if ($category->postCategory) {
            //     foreach ($category->postCategory as $keyPostCategory => $postCategory) {
            //         if (!empty($postCategory->post)) {
            //             $ids[] = $postCategory->post->id;
            //         }
            //     }
            // }
            // if ($category->groupPosts) {
            //     foreach ($category->groupPosts as $keyGroup => $groupPosts) {
            //         $listGroup[] = $groupPosts->group;
            //     }
            // }
            // if ($category->postCategory) {
            //     foreach ($category->postCategory as $keyPostCategory => $postCategory) {
            //         if (!empty($postCategory->post)) {
            //             $idPost[] = $postCategory->post->id;
            //         }
            //     }
            // }
            // if ($group->listPost) {
            //     foreach ($group->listPost as $keyPost => $itemPost) {
            //         if (in_array($itemPost->id, $idPost)) {
            //             $ids[] = $itemPost->id;
            //         }
            //     }
            // }

            $postGroup = $this->postGroupRepository->getAll(['group_id' => $group->id]);
            if ($category->groupPosts) {
                foreach ($category->groupPosts as $keyGroup => $groupPosts) {
                    $listGroup[] = $groupPosts->group;
                }
                if ($postGroup) {
                    foreach ($postGroup as $keyPost => $itemPost) {
                        $ids[] = $itemPost->post_id;
                    }
                }
            }
        } else {
            if ($category->groupPosts) {
                foreach ($category->groupPosts as $keyGroup => $groupPosts) {
                    $listGroup[] = $groupPosts->group;
                    if ($groupPosts->posts) {
                        foreach ($groupPosts->posts as $keyPost => $itemPost) {
                            $ids[] = $itemPost->post_id;
                        }
                    }
                }
            }
            // if ($category->groupPosts) {
            //     foreach ($category->groupPosts as $keyGroup => $groupPosts) {
            //         $listGroup[] = $groupPosts->group;
            //     }
            // }
            // if ($category->postCategory) {
            //     foreach ($category->postCategory as $keyPostCategory => $postCategory) {
            //         if (!empty($postCategory->post)) {
            //             $ids[] = $postCategory->post->id;
            //         }
            //     }
            // }
        }

        if ($ids) {
            $listPost = $this->postsService->getAll(['ids_new' => $ids]);
            $postSoft = $this->postsService->getAll(['updated_at' => 'desc', 'idPosts' => $ids]);
        }
        return compact('listPost', 'category', 'listGroup', 'listUseful', 'postSoft');
    }

    public function detail($id, Request $request)
    {
        $posts = $this->postsService->find($id);
        
        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($posts['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }
        
        $param = $request->all();
        $category = '';
        $data = [];
        if (isset($param['category'])) {
            $category = $this->categoryRepository->find($param['category']);
            
            //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
            if ($posts['status'] <> self::PUBLIC) {
                throw new NotFoundHttpException ("非公開投稿への直接参照");
            }
        }
        if (!$category) {
            return redirect()->route('home');
        }
        if (isset($posts['content']) && $posts['content']) {
            $content = explode(config("constants.auto_pagination"), $posts['content']);
            $data = customPaginate($content);
            foreach ($content as $key => $value) {
                $paginationContent[$key + 1] = $value;
            }
        }
        $listPostsRelated = $this->listPostsRelated($category, $id);
        $optionProduct = [
            'limit' => 2,
            'display' => 1
        ];
        $listProductGroup = $this->productGroupRepository->getAll($optionProduct);
        return view($this->module . '::detail', compact(
            'posts',
            'category',
            'data',
            'listPostsRelated',
            'listProductGroup'
        ));
    }

    public function listPostsRelated($category, $id)
    {
        $listPostsRelated = [];
        if ($category->groupPosts) {
            foreach ($category->groupPosts as $keyGroup => $groupPosts) {
                $listGroup[] = $groupPosts->group;
                if ($groupPosts->posts) {
                    foreach ($groupPosts->posts as $keyPost => $itemPost) {
                        if ($itemPost->post) {
                            $ids[] = $itemPost->post->id;
                        }
                    }
                }
            }
        }
        if ($ids) {
            $ids = array_diff($ids, [$id]);
            $listPostsRelated = $this->postsService->getAll(['ids' => $ids, 'limit' => 5]);
        }

        return $listPostsRelated;
    }
}
