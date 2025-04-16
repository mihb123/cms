<?php

namespace Modules\Cms\Product\Controllers;

use App\Common\Response;
use App\Http\Requests\ProductOption\CreateRequest;
use App\Http\Requests\ProductOption\UpdateRequest;
use App\Repositories\ProductOptionRepository;
use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    protected $categoryService;
    protected $productOptionRepository;
    protected $module = '';

    public function __construct(
        CategoryService $categoryService,
        ProductOptionRepository $productOptionRepository
    ) {
        $this->categoryService = $categoryService;
        $this->productOptionRepository = $productOptionRepository;

        $listCategory = $this->categoryService->getAll(['type' => 'product']);
        View::share(compact('listCategory'));
    }

    public function index()
    {
        return view('product::option.index');
    }

    public function create()
    {
        return view('product::option.create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->productOptionRepository->create($request);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->productOptionRepository->find($id);
        return view('product::option.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->productOptionRepository->update($request, $id);
        return $result;
    }

    public function destroy($id)
    {
        return $this->productOptionRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->productOptionRepository->getAjax($request);
    }

    public function getProductAndCompany(Request $request)
    {
        $param = $request->all();
        if (!$param['id']) {
            return;
        }
        $category = $this->categoryService->find($param['id']);
        if(!empty($param['product_option_id'])) {
            $productOption = $this->productOptionRepository->find($param['product_option_id']);
        }
        $html = view('product::option.list', [
            'category' => $category ?? [],
            'data' => $productOption ?? []
        ])->render();

        return Response::success('', $html);
    }
}
