<?php

namespace Modules\Cms\Notice\Controllers;

use App\Http\Requests\NoticeCategory\CreateRequest;
use App\Http\Requests\NoticeCategory\UpdateRequest;
use App\Services\NoticeCategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class NoticeCategoryController extends Controller
{
    protected $noticeCategoryService;

    public function __construct(NoticeCategoryService $noticeCategoryService)
    {
        $this->noticeCategoryService = $noticeCategoryService;
    }

    public function index()
    {
        return view('notice::category.index');
    }

    public function create()
    {
        return view('notice::category.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->noticeCategoryService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('notice::messages.success'));
        }
        return redirect()->back()->withErrors(__('notice::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->noticeCategoryService->find($id);

        return view('notice::category.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->noticeCategoryService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('notice::messages.update'));
        }
        return redirect()->back()->withErrors(__('notice::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->noticeCategoryService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->noticeCategoryService->getAjax($request);
    }
}
