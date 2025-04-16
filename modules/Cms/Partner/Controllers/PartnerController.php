<?php

namespace Modules\Cms\Partner\Controllers;
use App\Services\PartnerService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\Partner\UpdateRequest;
use App\Http\Requests\Partner\CreateRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $partnerService;
    protected $module = '';

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    public function index()
    {
        return view('partner::index');
    }

    public function create()
    {
        return view('partner::create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->partnerService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('creator::messages.success'));
        }
        return redirect()->back()->withErrors(__('creator::messages.failed'));
    }

    public function edit($id)
    {
        $partner = $this->partnerService->find($id);

        return view('partner::edit', compact('partner'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->partnerService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('creator::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('creator::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->partnerService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->partnerService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        $id = $request->get('id');
        if(validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $creator = $this->partnerService->find($id);

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
