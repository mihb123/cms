<?php

namespace Modules\Cms\Product\Controllers;

use App\Http\Requests\ProductNews\CreateRequest;
use App\Http\Requests\ProductNews\UpdateRequest;

use App\Services\CategoryService;
use App\Services\CompanyService;
use App\Services\ProductNewsService;
use App\Services\ProductService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $categoryService;
    protected $productNewsService;
    protected $module = '';

    public function __construct(
        CategoryService $categoryService,
        ProductNewsService $productNewsService
    ) {
        $this->categoryService = $categoryService;
        $this->productNewsService = $productNewsService;

        $listCategory = $this->categoryService->getAll(['type' => 'product-news']);
        View::share(compact('listCategory'));
    }

    public function index()
    {
        return view('product::news.index');
    }

    public function create()
    {
        return view('product::news.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->productNewsService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $product = $this->productNewsService->find($id);
        return view('product::news.edit', compact('product'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->productNewsService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->productNewsService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->productNewsService->getAjax($request);
    }

    public function display(Request $request)
    {
        return $this->productNewsService->display($request);
    }

    public function changeSort(Request $request)
    {
        return $this->productNewsService->changeSort($request);
    }
}
