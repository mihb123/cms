<?php

namespace Modules\Cms\Posts\Controllers;

use App\Services\PostsTypeService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\PostsType\UpdateRequest;
use App\Http\Requests\PostsType\CreateRequest;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $postsTypeService;

    public function __construct (PostsTypeService $postsTypeService) {
        $this->postsTypeService = $postsTypeService;
    }

    public function index()
    {
        return view('posts::type.index');
    }

    public function create()
    {
        return view('posts::type.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->postsTypeService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->postsTypeService->find($id);

        return view('posts::type.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->postsTypeService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('posts::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('posts::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->postsTypeService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->postsTypeService->getAjax($request);
    }
}
