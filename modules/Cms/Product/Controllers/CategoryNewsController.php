<?php

namespace Modules\Cms\Product\Controllers;

use App\Http\Requests\ProductCategoryNews\CreateRequest;
use App\Http\Requests\ProductCategoryNews\UpdateRequest;
use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    protected $categoryService;
    protected $groupService;
    protected $module = '';

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('product::category_news.index');
    }

    public function create()
    {
        return view('product::category_news.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'product-news';
        $result = $this->categoryService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->categoryService->find($id);

        return view('product::category_news.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'product-news';
        $result = $this->categoryService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->categoryService->getAjaxProduct($request, 'product-news', 'product-category-news');
    }

    public function changeSort(Request $request)
    {
        return $this->categoryService->changeSort($request);
    }

    public function display(Request $request)
    {
        return $this->categoryService->display($request);
    }
}
