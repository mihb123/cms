<?php

namespace Modules\Cms\Tag\Controllers;

use Auth;
use Datatables;
use View;
use App\Http\Requests\Tag\UpdateRequest;
use App\Services\GroupService;
use App\Http\Requests\Tag\CreateRequest;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $groupService;
    protected $tagService;

    protected $module = '';

    public function __construct(TagService $tagService, GroupService $groupService)
    {
        $this->tagService = $tagService;
        $this->groupService = $groupService;
        $this->module = 'tag';
        view::share('_module', $this->module);
    }

    public function index()
    {
        return view('tag::index');
    }

    public function create()
    {
        $listGroup = $this->groupService->getAll();
        return view('tag::create', compact('listGroup'));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->tagService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __($this->module . '::messages.success'));
        }
        return redirect()->back()->withErrors(__($this->module . '::messages.failed'));
    }

    public function edit($id)
    {
        $tag = $this->tagService->find($id);
        $listGroup = $this->groupService->getAll();
        return view('tag::edit', compact('tag', 'listGroup'));
    }

    public function update(UpdateRequest $request, $id)
    {

        $data = $request->all();
        $result = $this->tagService->update($data, $id);

        if ($result) {
            return redirect()->back()->with('success', __($this->module . '::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__($this->module . '::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->tagService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->tagService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->tagService->changeSort($request);
    }
}
