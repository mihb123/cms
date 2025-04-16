<?php

namespace Modules\Cms\Tag\Controllers;

use App\Services\CreatorService;
use App\Services\TagNewsService;
use Auth;
use Datatables;
use View;
use App\Http\Requests\TagNews\UpdateRequest;
use App\Http\Requests\TagNews\CreateRequest;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagNewsController extends Controller
{
    protected $tagService;
    protected $tagNewsService;
    protected $creatorService;

    public function __construct(TagService $tagService, TagNewsService $tagNewsService, CreatorService $creatorService)
    {
        $this->tagService = $tagService;
        $this->tagNewsService = $tagNewsService;
        $this->creatorService = $creatorService;
        $listTag = $this->tagService->getAll();
        $listCreator = $this->creatorService->getAll();
        View::share(compact('listTag','listCreator'));
    }

    public function index()
    {
        return view('tag::news.index');
    }

    public function create()
    {
        return view('tag::news.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->tagNewsService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function edit($id)
    {
        $tagNews = $this->tagNewsService->find($id);

        return view('tag::news.edit', compact('tagNews'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();

        $result = $this->tagNewsService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success_edit'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed_edit'));
    }

    public function destroy($id)
    {
        return $this->tagNewsService->destroy($id);

    }

    public function ajax(Request $request)
    {
        return $this->tagNewsService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->tagNewsService->changeSort($request);
    }
}
