<?php

namespace Modules\Frontend\Notice\Controllers;

use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\SiteMapManageService;
use App\Services\PostUsefulService;
use Illuminate\Http\Request;
use View;

//ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoticeController extends Controller
{
    protected $topicUsefulService;
    protected $menuService;
    protected $noticeService;
    protected $siteMapManageService;
    
    //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
    const PUBLIC = 1;   //1: 公開ステータス

    public function __construct (
        PostUsefulService $topicUsefulService,
        MenuService $menuService,
        NoticeService $noticeService,
        SiteMapManageService $siteMapManageService
    ) {
        $this->topicUsefulService = $topicUsefulService;
        $this->menuService = $menuService;
        $this->noticeService = $noticeService;
        $notification = 'notification';
        $this->siteMapManageService = $siteMapManageService;
        $listSiteMap = $this->siteMapManageService->general();
        view::share(compact('notification', 'listSiteMap'));
    }

    public function index(Request $request)
    {
        $param = $request->all();
        $option = [];
        $currentYear = date('Y');
        if (isset($param['year'])) {
            $option = [
                'year' => $param['year']
            ];
            $currentYear = $param['year'];
        }
        $optionNotice = [
            'limit' => 3
        ];
        $listNoticeYear = $this->noticeService->getAll($option);
        $listNotice = $this->noticeService->getAll($optionNotice);

        $listMenu = $this->menuService->general();

        return view('notification::index',compact('listMenu', 'listNotice', 'listNoticeYear', 'currentYear'));
    }

    public function detail($id)
    {
        $notice = $this->noticeService->find($id);
        
        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($notice['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }
        
        $optionNotice = [
            'limit' => 3
        ];
        $listNotice = $this->noticeService->getAll($optionNotice);
        $listMenu = $this->menuService->general();
        return view('notification::detail',compact('notice', 'listMenu', 'listNotice'));
    }
}
