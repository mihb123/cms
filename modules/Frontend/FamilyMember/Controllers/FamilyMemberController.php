<?php

namespace Modules\Frontend\FamilyMember\Controllers;

use App\Models\FamilyMemberTagGroup;
use App\Repositories\ProductGroupRepository;
use App\Services\FamilyMemberCategoryService;
use App\Services\FamilyMemberNewsService;
use App\Services\FamilyMemberService;
use App\Services\FamilyMemberTagGroupService;
use App\Services\GroupService;
use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\PostsTopicService;
use App\Services\SiteMapManageService;
use App\Services\PostUsefulService;
use Illuminate\Http\Request;
use View;

//ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FamilyMemberController extends Controller
{
    protected $module = '';
    protected $groupService;
    protected $postUsefulService;
    protected $menuService;
    protected $familyMemberService;
    protected $familyMemberNewsService;
    protected $familyMemberTagGroupService;
    protected $familyMemberCategoryService;
    protected $noticeService;
    protected $siteMapManageService;
    protected $postsTopicService;
    protected $productGroupRepository;

    //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
    const PUBLIC = 1;   //1: 公開ステータス
    
    public function __construct(
        PostUsefulService $postUsefulService,
        MenuService $menuService,
        FamilyMemberService $familyMemberService,
        FamilyMemberNewsService $familyMemberNewsService,
        GroupService $groupService,
        PostsTopicService $postsTopicService,
        NoticeService $noticeService,
        FamilyMemberTagGroupService $familyMemberTagGroupService,
        FamilyMemberCategoryService $familyMemberCategoryService,
        SiteMapManageService $siteMapManageService,
        ProductGroupRepository $productGroupRepository
    ) {
        $this->module = 'mitori-taiken';
        $this->postUsefulService = $postUsefulService;
        $this->menuService = $menuService;
        $this->familyMemberService = $familyMemberService;
        $this->familyMemberNewsService = $familyMemberNewsService;
        $this->groupService = $groupService;
        $this->familyMemberTagGroupService = $familyMemberTagGroupService;
        $this->familyMemberCategoryService = $familyMemberCategoryService;
        $this->siteMapManageService = $siteMapManageService;
        $this->noticeService = $noticeService;
        $this->postsTopicService = $postsTopicService;
        $this->productGroupRepository = $productGroupRepository;
        $listUseful = $this->init()['listUseful'];
        $listMenu = $this->init()['listMenu'];
        $listNotice = $this->init()['listNotice'];
        $listTagGroup = $this->familyMemberTagGroupService->getAll();
        $listCategory = $this->familyMemberCategoryService->getAll();
        $listSiteMap = $this->siteMapManageService->general();
        $pagiClass = 'mitori-pagination';
        $moduleMitoriTaiken = 'mitori-taiken';
        $class = 'mitori-taiken';
        $optionTopic = [
            'limit' => 4
        ];
        $listTopic = $this->postsTopicService->getAll($optionTopic);

        view::share('_module', $this->module);
        view::share(compact(
            'listUseful',
            'listMenu',
            'listTagGroup',
            'listCategory',
            'listNotice',
            'pagiClass',
            'moduleMitoriTaiken',
            'class',
            'listSiteMap',
            'listTopic',
        ));
    }

    public function index(Request $request)
    {
        $param = $request->all();
        if (isset($param['keyword'])) {
            $optionTopic = [
                'type' => 'topic',
                'keyword' => $param['keyword'],
                'ignore_pagi' => 1
            ];
            $optionNews = [
                'type' => 'news',
                'keyword' => $param['keyword']
            ];
        } else {
            $optionTopic = [
                'type' => 'topic',
                'ignore_pagi' => 1
            ];
            $optionNews = [
                'type' => 'news'
            ];
        }

        $listFamilyMember = $this->familyMemberService->getAll();
        $listTopicMember = $this->familyMemberNewsService->getAll($optionTopic);
        $listNews = $this->familyMemberNewsService->getAll($optionNews);
        $mitoriTaiken = 'mitori-taiken';
        $name = '';
        return view(
            $this->module . '::index',
            compact(
                'listFamilyMember',
                'listTopicMember',
                'listNews',
                'mitoriTaiken',
                'name'
            )
        );
    }

    public function list(Request $request)
    {
        $param = $request->all();
        $name = '';
        if (isset($param['keyword'])) {
            $option = [
                'keyword' => $param['keyword']
            ];
            $name = $param['keyword'];
        } elseif (isset($param['category'])) {
            $option = [
                'category' => $param['category']
            ];
            $name = $param['category'];
        } else {
            $option = [
                'type' => 'news'
            ];
        }

        $listNews = $this->familyMemberNewsService->getAll($option);
        $mitoriTaikenList = 'content-left-wrap';
        $home = 'mitori-layout-2';
        $optionProduct = [
            'limit' => 2,
            'display' => 1
        ];
        $listProductGroup = $this->productGroupRepository->getAll($optionProduct);
        return view($this->module . '::list', compact(
            'listNews',
            'name',
            'mitoriTaikenList',
            'home',
            'listProductGroup'
        ));
    }

    public function detail($id, Request $request)
    {
        $data = $listContent = [];
        $param = $request->all();
        $page = 1;
        $pagAfter = '';
        if (isset($param['page']) && $param['page'] != 1) {
            $page = $param['page'];
            $pagAfter = 'page-after';
        }
        $familyNew = $this->familyMemberNewsService->find($id);
        
        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($familyNew['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }
        
        if (isset($familyNew->content) && $familyNew->content != '') {
            //            $data = customPaginate($familyNew->content);
            $data = $familyNew->content;
            foreach ($familyNew->content as $key => $item) {
                $listContent[] = $item;
            }
        }
        $mitoriTaikenDetail = 'mitori-taiken-detail';
        $sloganMitori = 'slogan-mitori';
        $optionProduct = [
            'limit' => 2,
            'display' => 1
        ];
        $listProductGroup = $this->productGroupRepository->getAll($optionProduct);
        return view($this->module . '::detail', compact(
            'familyNew',
            'data',
            'mitoriTaikenDetail',
            'listContent',
            'page',
            'sloganMitori',
            'listContent',
            'pagAfter',
            'listProductGroup'
        ));
    }
}
