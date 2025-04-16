<?php

namespace Modules\Cms\FamilyMember\Controllers;

use Auth;
use Datatables;
use View;
use App\Http\Requests\FamilyMember\UpdateRequest;
use App\Http\Requests\FamilyMember\CreateRequest;
use App\Services\FamilyMemberService;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    protected $familyMemberService;

    public function __construct(FamilyMemberService $familyMemberService)
    {
        $this->familyMemberService = $familyMemberService;

    }

    public function index()
    {
        return view('family-member::index');
    }

    public function create()
    {
        return view('family-member::create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->familyMemberService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed'));
    }

    public function edit($id)
    {
        $familyMember = $this->familyMemberService->find($id);

        return view('family-member::edit', compact('familyMember'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->familyMemberService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('family-member::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('family-member::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->familyMemberService->destroy($id);

    }

    public function ajax(Request $request)
    {
        return $this->familyMemberService->getAjax($request);
    }
}
