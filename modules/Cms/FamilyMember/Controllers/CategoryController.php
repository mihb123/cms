<?php

namespace Modules\Cms\FamilyMember\Controllers;

use App\Http\Requests\FamilyMemberCategory\CreateRequest;
use App\Http\Requests\FamilyMemberCategory\UpdateRequest;
use App\Services\FamilyMemberCategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $familyMemberCategoryService;

    protected $module = '';

    public function __construct(FamilyMemberCategoryService $familyMemberCategoryService)
    {
        $this->familyMemberCategoryService = $familyMemberCategoryService;
    }

    public function index()
    {
        return view('family-member::category.index');
    }

    public function create()
    {
        return view('family-member::category.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->familyMemberCategoryService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function edit($id)
    {
        $category = $this->familyMemberCategoryService->find($id);

        return view('family-member::category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->familyMemberCategoryService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->familyMemberCategoryService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->familyMemberCategoryService->getAjax($request);
    }
    
    public function changeSort(Request $request)
    {
        $id = $request->get('id');
        if(validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->familyMemberCategoryService->find($id);

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
