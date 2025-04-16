<?php

namespace Modules\Cms\FamilyMember\Controllers;

use Auth;
use Datatables;
use View;
use App\Http\Requests\FamilyMemberTag\UpdateRequest;
use App\Http\Requests\FamilyMemberTag\CreateRequest;
use App\Services\FamilyMemberTagGroupService;
use App\Services\FamilyMemberTagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $familyMemberTagGroupService;
    protected $familyMemberTagService;

    protected $module = '';

    public function __construct(
        FamilyMemberTagService $familyMemberTagService,
        FamilyMemberTagGroupService $familyMemberTagGroupService)
    {
        $this->familyMemberTagService = $familyMemberTagService;
        $this->familyMemberTagGroupService = $familyMemberTagGroupService;
        view::share('_module', $this->module);
    }

    public function index()
    {
        return view('family-member::tag.index');
    }

    public function create()
    {
        $listGroup = $this->familyMemberTagGroupService->getAll();
        return view('family-member::tag.create', compact('listGroup'));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->familyMemberTagService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function edit($id)
    {
        $tag = $this->familyMemberTagService->find($id);
        $listGroup = $this->familyMemberTagGroupService->getAll();

        return view('family-member::tag.edit', compact('tag', 'listGroup'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->familyMemberTagService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->familyMemberTagService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->familyMemberTagService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        $id = $request->get('id');
        if(validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->familyMemberTagService->find($id);

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
