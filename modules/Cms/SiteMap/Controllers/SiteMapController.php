<?php

namespace Modules\Cms\SiteMap\Controllers;

use App\Services\SiteMapService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\SiteMap\UpdateRequest;
use App\Http\Requests\SiteMap\CreateRequest;

use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    protected $siteMapService;

    public function __construct(SiteMapService $siteMapService)
    {
        $this->siteMapService = $siteMapService;
    }

    public function index()
    {
        return view('sitemap::index');
    }

    public function create()
    {
        return view('sitemap::create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->siteMapService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('sitemap::messages.success'));
        }
        return redirect()->back()->withErrors(__('sitemap::messages.failed'));
    }

    public function edit($id)
    {
        $siteMap = $this->siteMapService->find($id);

        return view('sitemap::edit', compact('siteMap'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->siteMapService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('sitemap::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('sitemap::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->siteMapService->destroy($id);

    }

    public function ajax(Request $request)
    {
        return $this->siteMapService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->siteMapService->changeSort($request);
    }
}
