<?php

namespace Modules\Cms\Product\Controllers;

use App\Http\Requests\Company\CreateRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Repositories\CompanyServiceRepository;
use App\Repositories\ServiceRepository;
use App\Services\CategoryService;
use App\Services\CompanyService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $categoryService;
    protected $companyService;
    protected $serviceRepository;

    protected $module = '';

    public function __construct(
        CategoryService $categoryService,
        CompanyService $companyService,
        ServiceRepository $serviceRepository
    ) {
        $this->categoryService = $categoryService;
        $this->companyService = $companyService;
        $this->serviceRepository = $serviceRepository;

        $listCategory = $this->categoryService->getAll(['type' => 'product']);
        $listService = $this->serviceRepository->getAll();

        View::share(compact('listCategory', 'listService'));
    }

    public function index()
    {
        return view('product::company.index');
    }

    public function create()
    {
        return view('product::company.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->companyService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->companyService->find($id);
        $categoryIds = $serviceIds = [];
        if(isset($data->category) && $data->category) {
            foreach ($data->category as $key => $value) {
                $categoryIds[] = $value['category_id'];
            }
        }
        if(isset($data->service) && $data->service) {
            foreach ($data->service as $key => $service) {
                $serviceIds[] = $service['service_id'];
            }
        }

        return view('product::company.edit', compact('data', 'categoryIds', 'serviceIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->companyService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->companyService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->companyService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->companyService->changeSort($request);
    }
}
