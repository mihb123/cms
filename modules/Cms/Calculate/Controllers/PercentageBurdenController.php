<?php

namespace Modules\Cms\Calculate\Controllers;

use App\Http\Requests\PercentageBurden\CreateRequest;
use App\Http\Requests\PercentageBurden\UpdateRequest;
use App\Repositories\PercentageBurdenRepository;
use App\Services\GroupService;
use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class PercentageBurdenController extends Controller
{
    protected $categoryService;
    protected $percentageBurdenRepository;
    protected $module = '';

    public function __construct(
        CategoryService $categoryService,
        PercentageBurdenRepository $percentageBurdenRepository
    ) {
        $this->categoryService = $categoryService;
        $this->percentageBurdenRepository = $percentageBurdenRepository;
        $listCategory = $this->categoryService->getAll(['type' => 'calculate']);
        View::share(compact('listCategory'));
    }

    public function index()
    {
        return view('calculate::percentage_burden.index');
    }

    public function create()
    {
        return view('calculate::percentage_burden.create');
    }

    public function store(CreateRequest $request)
    {
        $result = $this->percentageBurdenRepository->create($request);
        if ($result) {
            return redirect()->back()->with('success', __('calculate::messages.success'));
        }
        return redirect()->back()->withErrors(__('calculate::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->percentageBurdenRepository->find($id);
        $categoryIds = [];
        if (isset($data->category) && $data->category) {
            foreach ($data->category as $key => $value) {
                $categoryIds[] = $value['category_id'];
            }
        }
        return view('calculate::percentage_burden.edit', compact('data', 'categoryIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->percentageBurdenRepository->update($request, $id);
        if ($result) {
            return redirect()->back()->with('success', __('calculate::messages.success'));
        }
        return redirect()->back()->withErrors(__('calculate::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->percentageBurdenRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->percentageBurdenRepository->getAjax($request);
    }

}
