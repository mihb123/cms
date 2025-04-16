<?php

namespace Modules\Cms\Product\Controllers;

use App\Http\Requests\Factory\CreateRequest;
use App\Http\Requests\Factory\UpdateRequest;
use App\Repositories\FactoryRepository;
use App\Services\CategoryService;
use App\Services\CompanyService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    protected $factoryRepository;
    protected $module = '';

    public function __construct(
        FactoryRepository $factoryRepository
    ) {
        $this->factoryRepository = $factoryRepository;
    }

    public function index()
    {
        return view('product::factory.index');
    }

    public function create()
    {
        return view('product::factory.create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->factoryRepository->create($request);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->factoryRepository->find($id);

        return view('product::factory.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->factoryRepository->update($request, $id);
        if ($result) {
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->factoryRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->factoryRepository->getAjax($request);
    }

}
