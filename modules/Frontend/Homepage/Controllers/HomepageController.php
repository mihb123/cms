<?php

namespace Modules\Frontend\Homepage\Controllers;

use App\Repositories\ProductGroupRepository;
use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\PartnerService;
use App\Services\PostsTopicService;
use App\Services\PostUsefulService;
use App\Services\SiteMapManageService;
use View;

class HomepageController extends Controller
{
    protected $module = '';
    protected $noticeService;
    protected $partnerService;
    protected $postsTopicService;
    protected $postUsefulService;
    protected $menuService;
    protected $siteMapManageService;
    protected $productGroupRepository;


    public function __construct(
        NoticeService $noticeService,
        PartnerService $partnerService,
        PostsTopicService $postsTopicService,
        PostUsefulService $postUsefulService,
        MenuService $menuService,
        SiteMapManageService $siteMapManageService,
        ProductGroupRepository $productGroupRepository
    ) {
        $this->module = 'homepage';
        $this->noticeService = $noticeService;
        $this->partnerService = $partnerService;
        $this->postsTopicService = $postsTopicService;
        $this->postUsefulService = $postUsefulService;
        $this->menuService = $menuService;
        $this->siteMapManageService = $siteMapManageService;
        $this->productGroupRepository = $productGroupRepository;
        $home = 'home';

        view::share('_module', $this->module);
        view::share(compact('home'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $optionNotice = [
            'limit' => 3
        ];
        $optionTopic = [
            'limit' => 4
        ];
        $optionUseful = [
            'limit' => 5
        ];
        $optionProduct = [
            'limit' => 2,
            'display' => 1
        ];
        $listNotice = $this->noticeService->getAll($optionNotice);
        $listPartner = $this->partnerService->getAll();
        $listTopic = $this->postsTopicService->getAll(['position' => 1]);
        $listUseful = $this->postUsefulService->getAll($optionUseful);
        $listMenu = $this->menuService->general();
        $listSiteMap = $this->siteMapManageService->general();
        $listProductGroup = $this->productGroupRepository->getAll($optionProduct);

        return view(
            $this->module . '::index',
            compact(
                'listNotice',
                'listPartner',
                'listTopic',
                'listUseful',
                'listMenu',
                'listSiteMap',
                'listProductGroup'
            )
        );
    }

    public function errors()
    {
        return view($this->module . '::errors', [
            'classHome' => 'page-error'
        ]);
    }
}
