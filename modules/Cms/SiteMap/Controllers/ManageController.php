<?php

namespace Modules\Cms\SiteMap\Controllers;

use App\Services\SiteMapManageService;
use App\Services\SiteMapService;
use Auth;
use Datatables;
use View;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    protected $siteMapService;
    protected $siteMapManageService;

    public function __construct (
        SiteMapService $siteMapService,
        SiteMapManageService $siteMapManageService
    ) {
        $this->siteMapService = $siteMapService;
        $this->siteMapManageService = $siteMapManageService;
    }

    public function index()
    {
        $name = [];
        $listSiteMap = $this->siteMapService->getAll();
        if ($listSiteMap) {
            foreach ($listSiteMap as $key => $items) {
                $name[$items['id']] = $items;
            }
        }
        $siteMap = $this->siteMapManageService->getAll();

        return view('sitemap::manage.index', compact('listSiteMap', 'siteMap', 'name'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->siteMapManageService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('sitemap::messages.success'));
        }
        return redirect()->back()->withErrors(__('sitemap::messages.failed'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $result = $this->siteMapManageService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('sitemap::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('sitemap::messages.failed_edit'));
    }

}
