<?php

namespace Modules\Frontend\Posts\Controllers;

use App\Repositories\CategoryRepository;
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

class UsefulController extends Controller
{
    protected $module = '';
    protected $postUsefulService;
    protected $menuService;
    protected $noticeService;
    protected $siteMapManageService;
    protected $categoryRepository;
    protected $postsService;
    protected $groupService;
    protected $postsTopicService;
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
        PostsTopicService $postsTopicService,
        ProductGroupRepository $productGroupRepository
    ) {
        $this->module = 'post-frontend';
        $this->postUsefulService = $postUsefulService;
        $this->menuService = $menuService;
        $this->noticeService = $noticeService;
        $this->categoryRepository = $categoryRepository;
        $this->siteMapManageService = $siteMapManageService;
        $this->postsService = $postsService;
        $this->postsTopicService = $postsTopicService;
        $this->productGroupRepository = $productGroupRepository;

        $secondOpinion = 'true';
        $listNotice = $this->init()['listNotice'];
        $listMenu = $this->init()['listMenu'];
        $listUseful = $this->init()['listUseful'];
        $listSiteMap = $this->siteMapManageService->general();
        $listCategory = $this->categoryRepository->getall(['type' => 'posts-useful']);
        
        $home = $class = 'cms12';
        $postsUseful = 'true';
        $optionTopic = [
            'limit' => 4
        ];
        $listTopic = $this->postsTopicService->getAll(['position' => 1]);

        view::share('_module', $this->module);
        view::share(
            compact(
                'secondOpinion',
                'listNotice',
                'home',
                'listMenu',
                'listSiteMap',
                'listUseful',
                'listCategory',
                'postsUseful',
                'listTopic',

            )
        );
    }

    public function list(Request $request)
    {
        $option = [];
        $nameCategory = '';
        $param = $request->all();
        if (isset($param['category'])) {
            $option = [
                'category' => $param['category']
            ];
            $nameCategory = $param['category'];
        }

        $listPost = $this->postUsefulService->getAllUser($option);

        return view($this->module . '::useful.list', compact('listPost', 'nameCategory'));
    }

    public function detail($id)
    {
        $result = $this->postUsefulService->find($id);
        
        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($result['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }

        $usefulDetail = true;
        $data = [];

        if (isset($result['content']) && $result['content']) {
            $content = explode(config("constants.auto_pagination"), $result['content']);
            $data = customPaginate($content);
        }
        $optionProduct = [
            'limit' => 2,
            'display' => 1
        ];

        $listProductGroup = $this->productGroupRepository->getAll($optionProduct);
        $option = [
            'id_related' => $id,
            'category_id' => $result['category_id']
        ];
        
        $listPostsRelated = $this->postUsefulService->getAll($option);
        return view($this->module . '::useful.detail', compact(
            'result',
            'data',
            'usefulDetail',
            'listProductGroup',
            'listPostsRelated'
        ));
    }
}
