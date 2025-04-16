<?php

namespace Modules\Cms\Calculate\Controllers;

use App\Common\Response;
use App\Http\Requests\ServiceGroup\CreateRequest;
use App\Http\Requests\ServiceGroup\UpdateRequest;
use App\Repositories\CalculateGroupRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ServiceCalcuteRepository;
use App\Repositories\ServiceCategoryPercentageRepository;
use App\Repositories\ServiceGroupCategoryRepository;
use App\Services\CategoryService;
use App\Services\GroupService;
use Auth;
use Datatables;
use Illuminate\Http\Request;
use View;

class ManageController extends Controller
{
    protected $groupService;
    protected $categoryService;
    protected $serviceGroupCategoryRepository;
    protected $categoryRepository;
    protected $serviceCategoryPercentageRepository;
    protected $serviceCalcuteRepository;

    protected $module = '';

    public function __construct(
        GroupService $groupService,
        CategoryService $categoryService,
        CalculateGroupRepository $calculateGroupRepository,
        ServiceGroupCategoryRepository $serviceGroupCategoryRepository,
        CategoryRepository $categoryRepository,
        ServiceCategoryPercentageRepository $serviceCategoryPercentageRepository,
        ServiceCalcuteRepository $serviceCalcuteRepository
    ) {
        $this->groupService = $groupService;
        $this->categoryService = $categoryService;
        $this->serviceGroupCategoryRepository = $serviceGroupCategoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->serviceCategoryPercentageRepository = $serviceCategoryPercentageRepository;
        $this->serviceCalcuteRepository = $serviceCalcuteRepository;

        $listGroup = $this->groupService->getAll(['type' => 'calculate-service']);

        View::share(compact('listGroup'));
    }

    public function index()
    {
        return view('calculate::manage.index');
    }

    public function create()
    {
        return view('calculate::manage.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'calculate-service';
        $result = $this->groupService->create($data);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function edit($id)
    {
        $group = $this->groupService->find($id);
        $categoryIds = [];
        if (!empty($group->serviceCategory)) {
            foreach ($group->serviceCategory as $key => $groupService) {
                $categoryIds[] = $groupService->category_id;
            }
        }
        return view('calculate::group_service.edit', compact('group', 'categoryIds'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'calculate-service';
        $result = $this->groupService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success', __('tag::messages.success'));
        }
        return redirect()->back()->withErrors(__('tag::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->groupService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->groupService->getAjaxCalculateService($request);
    }

    public function changeSort(Request $request)
    {
        return $this->groupService->changeSort($request);
    }

    public function getCategory(Request $request)
    {
        $html = '';
        $param = $request->all();
        if (!$param['group_id']) {
            return;
        }
        $serviceCalculateIds = $this->serviceCalcuteRepository->getAll(['group_id' => $param['group_id']]);

        if (!empty($serviceCalculateIds)) {

            $categoryIds = $this->serviceCategoryPercentageRepository->getAll(['serviceCalculateIds' => $serviceCalculateIds]);
            $listCategory = $this->categoryRepository->getAll(['ids' => $categoryIds]);

            $html = view('calculate::manage.list_category', [
                'listCategory' => $listCategory ?? [],
                'type' => 'one_home'
            ])->render();
        }

        return Response::success('', $html);
    }

    public function getService(Request $request)
    {
        $html = '';
        $money = $fixedPrice = [];
        $param = $request->all();
        if (!$param['category_id'] && !$param['type']) {
            return;
        }

        $listServiceCategoryPercentage = $this->serviceCategoryPercentageRepository->getAll([
            'category_manage_id' => $param['category_id'],
            'type' => $param['type']
        ]);

        foreach ($listServiceCategoryPercentage as $key => $item) {
            $money[$item['category_id']][$item['service_calculate_id']] = $item['money'];
            $fixedPrice[$item['category_id']][$item['service_calculate_id']] = $item['fixed_price'];
        }

        if (!empty($listServiceCategoryPercentage)) {
            $listServiceCalculate = $this->serviceCalcuteRepository->getAll([
                'ids' => array_column($listServiceCategoryPercentage->toArray(), 'service_calculate_id')
            ]);

            $html = view('calculate::manage.list_service_calculate', [
                'listServiceCalculate' => $listServiceCalculate ?? [],
                'category_id' => $param['category_id'],
                'money' => $money,
                'fixedPrice' => $fixedPrice
            ])->render();
        }

        return Response::success('', $html);
    }

    public function changeMoney(Request $request)
    {
        $param = $request->all();

        if (!$param['category_id'] && !$param['service_calculate_id']) {
            return;
        }
        $option = [
            'category_id' => $param['category_id'],
            'service_calculate_id' => $param['service_calculate_id']
        ];

        return $this->serviceCategoryPercentageRepository->updateMoney($option, $param);

    }

    public function changeFixedPrice(Request $request)
    {
        $param = $request->all();

        if (!$param['category_id'] && !$param['service_calculate_id']) {
            return;
        }
        $option = [
            'category_id' => $param['category_id'],
            'service_calculate_id' => $param['service_calculate_id']
        ];

        return $this->serviceCategoryPercentageRepository->changeFixedPrice($option, $param);
    }

    public function getOption(Request $request)
    {
        $html = '';
        $param = $request->all();
        if (!$param['id']) {
            return;
        }
        if ($param['id'] == 1) {
            $html = view('calculate::manage.list_group')->render();
        } else {
            $listCategory = $this->categoryRepository->getAll(['type' => 'calculate']);
            $html = view('calculate::manage.list_category', [
                'listCategory' => $listCategory ?? [],
                'type' => 'care_facility'
            ])->render();
        }

        return Response::success('', $html);
    }
}
