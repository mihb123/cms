<?php

namespace Modules\Frontend\Tag\Controllers;

use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\PartnerService;
use App\Services\PostsTopicService;
use App\Services\SiteMapManageService;
use App\Services\TagNewsService;
use App\Services\TagService;
use App\Services\PostUsefulService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use View;

//ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TagController extends Controller
{
    protected $module = '';
    protected $tagService;
    protected $topicUsefulService;
    protected $menuService;
    protected $noticeService;
    protected $siteMapManageService;
    protected $categoryRepository;
    
     //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
    const PUBLIC = 1;   //1: 公開ステータス

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostUsefulService $topicUsefulService,
        MenuService $menuService,
        TagService $tagService,
        NoticeService $noticeService,
        SiteMapManageService $siteMapManageService,
        CategoryRepository $categoryRepository
    ) {
        $this->module = 'tag-frontend';
        $this->topicUsefulService = $topicUsefulService;
        $this->menuService = $menuService;
        $this->tagService = $tagService;
        $this->noticeService = $noticeService;
        $this->siteMapManageService = $siteMapManageService;
        $this->categoryRepository = $categoryRepository;

        $secondOpinion = 'true';
        $listNotice = $this->init()['listNotice'];
        $listMenu = $this->init()['listMenu'];
        $listUseful = $this->init()['listUseful'];
        $class = 'tag';
        $tag = 'true';
        view::share('_module', $this->module);
        view::share(compact('secondOpinion', 'listNotice', 'class', 'listMenu', 'listUseful', 'tag'));
    }

    public function detail($id, Request $request)
    {
        $data = $paginationContent = [];
        $page = 1;
        $param = $request->all();
        if (isset($param['page'])) {
            $page = $param['page'];
        }
        $tag = $this->tagService->find($id);
        
        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($tag['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }
        
        if (isset($tag->news) && $tag->news->content) {
//            $data = customPaginate($tag->news->content);
            $data = $tag->news->content;
            foreach ($tag->news->content as $key => $value) {
                $paginationContent[$key+1] = $value;
            }
        }
        $listSiteMap = $this->siteMapManageService->general();
        return view($this->module . '::detail', compact('data', 'tag', 'paginationContent', 'page', 'listSiteMap'));
    }

    public function list($id, Request $request)
    {
        $tag = '';
        $redirect = $this->menuCategory($id);
        if ($redirect) {
            return redirect("/");
        }
        $param = $request->all();
        if (isset($param['keyWord'])) {
            $option = [
                'keyWord' => $param['keyWord']
            ];
            $tag = $this->tagService->getAll($option);
        }

        return view($this->module .'::list', $this->getCategory($id,$tag));
    }

    public function menuCategory($id)
    {
        $listMenu = $this->menuService->general();
        $redirect = false;
        if(!isset($listMenu['categoryTags'][$id])) {
            $redirect = true;
        }
        return $redirect;
    }

    public function getCategory ($id, $tag = null)
    {
        $hideMenu = true;
        $category = $this->categoryRepository->find($id);
        
        //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($category['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }
        
        $tagGroups = $nameGroup = [];
        if ($tag) {
            foreach ($tag as $key => $item) {
                $group[$item->tagGroup->group_id][] = $item;
            }
            if($category->groupTag) {
                foreach ($category->groupTag as $keyGroup => $groupTag) {
                    if($groupTag->group) {
                        if (isset($group[$groupTag->group_id])) {
                            foreach ($group[$groupTag->group_id] as $keyTag => $tag) {
                                $tagGroups[$groupTag->group_id][] = $tag;
                                $nameGroup[$groupTag->group_id] = $groupTag->group->title_japan;
                            }
                        }
                    }
                }
            }
        } else {
            if($category->groupTag) {
                foreach ($category->groupTag as $keyGroup => $groupTag) {
                    if($groupTag->group) {
                        if ($groupTag->listTag) {
                            foreach ($groupTag->listTag as $keyTag => $group) {
                                $tagGroups[$groupTag->group->id][] = $group->tag;
                                $nameGroup[$groupTag->group->id] = $group->group->title_japan;
                            }
                        }
                    }
                }
            }
        }
        return compact('category', 'tagGroups', 'nameGroup', 'hideMenu');
    }
}
