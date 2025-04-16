<?php

namespace Modules\Cms\Product\Controllers;

use App\Http\Requests\Service\CreateRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Repositories\ServiceRepository;
use App\Services\CategoryService;
use App\Services\CompanyService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceRepository;
    protected $module = '';

    public function __construct(
        ServiceRepository $serviceRepository
    ) {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        return view('product::service.index');
    }

    public function create()
    {
        return view('product::service.create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->serviceRepository->create($request);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->serviceRepository->find($id);

        return view('product::service.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->serviceRepository->update($request, $id);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->serviceRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->serviceRepository->getAjax($request);
    }

    public function display(Request $request)
    {
        return $this->serviceRepository->display($request);
    }
}
