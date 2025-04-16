<?php

namespace Modules\Cms\Creator\Controllers;

use App\Services\CreatorService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\Creator\UpdateRequest;
use App\Http\Requests\Creator\CreateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Common\Response;

class CreatorController extends Controller
{
    protected $creatorService;
    protected $module = '';

    public function __construct(CreatorService $creatorService)
    {
        $this->creatorService = $creatorService;
    }

    public function index()
    {
        return view('creator::index');
    }

    public function create()
    {

        return view('creator::create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->creatorService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('creator::messages.success'));
        }
        return redirect()->back()->withErrors(__('creator::messages.failed'));
    }

    public function edit($id)
    {
        $creator = $this->creatorService->find($id);

        return view('creator::edit', compact('creator'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->creatorService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('creator::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('creator::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->creatorService->destroy($id);

    }

    public function ajax(Request $request)
    {
        return $this->creatorService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        $id = $request->get('id');
        if(validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $creator = $this->creatorService->find($id);

        if (!empty($creator)) {
            $creator->sort = $request->get('sort');
            if ($creator->save()) {
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }
}
