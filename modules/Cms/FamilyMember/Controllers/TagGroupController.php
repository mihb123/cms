<?php

namespace Modules\Cms\FamilyMember\Controllers;

use App\Http\Requests\FamilyMemberTagGroup\CreateRequest;
use App\Http\Requests\FamilyMemberTagGroup\UpdateRequest;
use App\Services\FamilyMemberTagGroupService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class TagGroupController extends Controller
{
    protected $familyMemberTagGroupService;

    protected $module = '';

    public function __construct(FamilyMemberTagGroupService $familyMemberTagGroupService)
    {
        $this->familyMemberTagGroupService = $familyMemberTagGroupService;
    }

    public function index()
    {
        return view('family-member::group.index');
    }

    public function create()
    {
        return view('family-member::group.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->familyMemberTagGroupService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function edit($id)
    {
        $group = $this->familyMemberTagGroupService->find($id);

        return view('family-member::group.edit', compact('group'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->familyMemberTagGroupService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->familyMemberTagGroupService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->familyMemberTagGroupService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        $id = $request->get('id');
        if(validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->familyMemberTagGroupService->find($id);

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
