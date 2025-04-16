<?php

namespace Modules\Cms\Notice\Controllers;

use App\Services\NoticeCategoryService;
use App\Services\NoticeService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\Notice\UpdateRequest;
use App\Http\Requests\Notice\CreateRequest;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    protected $noticeService;
    protected $noticeCategoryService;

    protected $module = '';

    public function __construct(NoticeService $noticeService, NoticeCategoryService $noticeCategoryService)
    {
        $this->noticeService = $noticeService;
        $this->noticeCategoryService = $noticeCategoryService;
    }

    public function index()
    {
        return view('notice::index');
    }

    public function create()
    {
        $noticeCategories = $this->noticeCategoryService->getAll();
        return view('notice::create', compact('noticeCategories'));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->noticeService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('notice::messages.success'));
        }
        return redirect()->back()->withErrors(__('notice::messages.failed'));
    }

    public function edit($id)
    {
        $notice = $this->noticeService->find($id);
        $noticeCategories = $this->noticeCategoryService->getAll();

        return view('notice::edit', compact('notice', 'noticeCategories'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->noticeService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('notice::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('notice::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->noticeService->destroy($id);

    }

    public function ajax(Request $request)
    {
        return $this->noticeService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        $id = $request->get('id');
        if(validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->noticeService->find($id);

        if (!empty($result)) {
            $result->sort = $request->get('sort');
            if ($result->save()) {
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }
}
