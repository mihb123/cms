<?php

namespace Modules\Cms\Calculate\Controllers;

use App\Common\Response;
use App\Http\Requests\ServiceCalculate\CreateRequest;
use App\Http\Requests\ServiceCalculate\UpdateRequest;
use App\Repositories\CalculateGroupRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\GroupCategoryRepository;
use App\Repositories\ServiceCalcuteRepository;
use App\Repositories\ServiceCategoryPercentageRepository;
use App\Repositories\ServiceGroupCategoryRepository;
use App\Services\GroupService;
use Auth;
use Datatables;
use Illuminate\Http\Request;
use View;

class ServiceController extends Controller
{
    protected $groupService;
    protected $module = '';
    protected $serviceCalcuteRepository;
    protected $calculateGroupRepository;
    protected $groupCategoryRepository;
    protected $serviceGroupCategoryRepository;
    protected $categoryRepository;
    protected $serviceCategoryPercentageRepository;

    public function __construct(
        GroupService $groupService,
        ServiceCalcuteRepository $serviceCalcuteRepository,
        CalculateGroupRepository $calculateGroupRepository,
        GroupCategoryRepository $groupCategoryRepository,
        ServiceGroupCategoryRepository $serviceGroupCategoryRepository,
        CategoryRepository $categoryRepository,
        ServiceCategoryPercentageRepository $serviceCategoryPercentageRepository
    ) {
        $this->groupService = $groupService;
        $this->serviceCalcuteRepository = $serviceCalcuteRepository;
        $this->calculateGroupRepository = $calculateGroupRepository;
        $this->groupCategoryRepository = $groupCategoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->serviceGroupCategoryRepository = $serviceGroupCategoryRepository;
        $this->serviceCategoryPercentageRepository = $serviceCategoryPercentageRepository;

        $listGroup = $this->groupService->getAll(['type' => 'calculate-service']);
        View::share(compact('listGroup'));
    }

    public function index()
    {
        return view('calculate::service.index');
    }

    public function create()
    {
        return view('calculate::service.create');
    }

    public function store(CreateRequest $request)
    {

        $result = $this->serviceCalcuteRepository->create($request);
        if ($result) {
            return redirect()->route('calculate-service.edit', [$result->id]);
        }
        return redirect()->back()->withErrors(__('calculate::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->serviceCalcuteRepository->find($id);

        return view('calculate::service.edit', compact('data'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $result = $this->serviceCalcuteRepository->update($request, $id);
        if ($result) {
            return redirect()->back()->with('success', __('calculate::messages.success'));
        }
        return redirect()->back()->withErrors(__('calculate::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->serviceCalcuteRepository->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->serviceCalcuteRepository->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->serviceCalcuteRepository->changeSort($request);
    }

    public function getCategory(Request $request)
    {
        $param = $request->all();
        if (!$param['group_id']) {
            return;
        }
        $listCategoryByGroup = $this->serviceGroupCategoryRepository->getAll(['id' => $param['group_id']]);
        if(!empty($listCategoryByGroup)) {
            $listCategory = $this->categoryRepository->getAll(['ids' => $listCategoryByGroup]);
            if (!empty($param['service_calculate_id'])) {
                $categoryIds = $this->serviceCategoryPercentageRepository->getAll(['service_calculate_id' => $param['service_calculate_id']]);
            }

            $html = view('calculate::service.list_category', [
                'listCategory' => $listCategory ?? [],
                'categoryIds' => $categoryIds ?? [],
            ])->render();
        }

        return Response::success('', $html);
    }
}
