<?php

namespace Modules\Cms\FamilyMember\Controllers;

use App\Http\Requests\FamilyMemberNews\CreateRequest;
use App\Http\Requests\FamilyMemberNews\UpdateRequest;
use App\Services\FamilyMemberCategoryService;
use App\Services\FamilyMemberNewsService;
use App\Services\FamilyMemberService;
use App\Services\FamilyMemberTagService;
use Auth;
use Datatables;
use Illuminate\Http\Request;
use View;

class NewsController extends Controller
{
    protected $familyMemberTagService;
    protected $familyMemberService;
    protected $familyMemberNewsService;
    protected $familyMemberCategoryService;

    public function __construct(
        FamilyMemberTagService $familyMemberTagService,
        FamilyMemberService $familyMemberService,
        FamilyMemberNewsService $familyMemberNewsService,
        FamilyMemberCategoryService $familyMemberCategoryService
    ) {
        $this->familyMemberTagService = $familyMemberTagService;
        $this->familyMemberService = $familyMemberService;
        $this->familyMemberNewsService = $familyMemberNewsService;
        $this->familyMemberCategoryService = $familyMemberCategoryService;
        $listTag = $this->familyMemberTagService->getAll();
        $listfamilyMember = $this->familyMemberService->getAll();
        $listCategory = $this->familyMemberCategoryService->getAll();
        $firsOfYear = date('Y-01-01');
        View::share(compact('listTag', 'listfamilyMember', 'listCategory', 'firsOfYear'));
    }

    public function index()
    {
        return view('family-member::news.index');
    }

    public function create()
    {
        return view('family-member::news.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();

        $result = $this->familyMemberNewsService->create($data);
        if ($result) {
            return redirect()->route('family-member-news.edit', [$result->id])->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->familyMemberNewsService->find($id);
        return view('family-member::news.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->familyMemberNewsService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->familyMemberNewsService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->familyMemberNewsService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        $id = $request->get('id');
        if(validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->familyMemberNewsService->find($id);

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
