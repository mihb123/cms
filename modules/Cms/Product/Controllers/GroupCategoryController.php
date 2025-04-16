<?php

namespace Modules\Cms\Product\Controllers;

use App\Http\Requests\ProductGroup\CreateRequest;
use App\Http\Requests\ProductGroup\UpdateRequest;
use App\Repositories\ProductGroupRepository;
use App\Services\CategoryService;
use Auth;
use Datatables;
use Illuminate\Http\Request;
use View;

class GroupCategoryController extends Controller
{
    protected $categoryService;
    protected $productGroupRepository;
    protected $module = '';

    public function __construct(
        CategoryService $categoryService,
        ProductGroupRepository $productGroupRepository
    ) {
        $this->categoryService = $categoryService;
        $this->productGroupRepository = $productGroupRepository;

        $listCategory = $this->categoryService->getAll(['type' => 'product']);
        View::share(compact('listCategory'));
    }

    public function index()
    {
        return view('product::group_category.index');
    }

    public function create()
    {
        return view('product::group_category.create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->productGroupRepository->create($request);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->productGroupRepository->find($id);
        $categoryIds = [];
        if (isset($data->category) && $data->category) {
            foreach ($data->category as $key => $value) {
                $categoryIds[] = $value['category_id'];
            }
        }

        return view('product::group_category.edit', compact('data', 'categoryIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->productGroupRepository->update($request, $id);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->productGroupRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->productGroupRepository->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->productGroupRepository->changeSort($request);
    }

    public function display(Request $request)
    {
        return $this->productGroupRepository->display($request);
    }
}
