<?php

namespace Modules\Frontend\Calculate\Controllers;

use App\Repositories\CalculateGroupRepository;
use App\Repositories\GroupCategoryRepository;
use App\Repositories\PercentageBurdenCategoryRepository;
use App\Repositories\ServiceCategoryPercentageRepository;
use App\Repositories\ServiceGroupCategoryRepository;
use App\Services\CategoryService;
use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\PostUsefulService;
use Illuminate\Http\Request;
use View;

class CalculateController extends Controller
{
    protected $module = '';
    protected $topicUsefulService;
    protected $menuService;
    protected $noticeService;
    protected $calculateGroupRepository;
    protected $percentageBurdenCategoryRepository;
    protected $serviceGroupCategoryRepository;
    protected $categoryService;
    protected $serviceCategoryPercentageRepository;
    protected $groupCategoryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostUsefulService $topicUsefulService,
        MenuService $menuService,
        NoticeService $noticeService,
        CalculateGroupRepository $calculateGroupRepository,
        ServiceGroupCategoryRepository $serviceGroupCategoryRepository,
        PercentageBurdenCategoryRepository $percentageBurdenCategoryRepository,
        CategoryService $categoryService,
        ServiceCategoryPercentageRepository $serviceCategoryPercentageRepository,
        GroupCategoryRepository $groupCategoryRepository
    ) {
        $this->module = 'calculate-frontend';
        $this->topicUsefulService = $topicUsefulService;
        $this->menuService = $menuService;
        $this->categoryService = $categoryService;
        $this->noticeService = $noticeService;
        $this->calculateGroupRepository = $calculateGroupRepository;
        $this->serviceGroupCategoryRepository = $serviceGroupCategoryRepository;
        $this->percentageBurdenCategoryRepository = $percentageBurdenCategoryRepository;
        $this->serviceCategoryPercentageRepository = $serviceCategoryPercentageRepository;
        $this->groupCategoryRepository = $groupCategoryRepository;

        $secondOpinion = 'true';
        $listNotice = $this->init()['listNotice'];
        $listMenu = $this->init()['listMenu'];
        $listUseful = $this->init()['listUseful'];
        $calculate = 'true';
        $class = 'calculate-page';
        view::share('module', $this->module);
        view::share(compact('secondOpinion', 'listNotice', 'listMenu', 'listUseful', 'calculate', 'class'));
    }

    public function home()
    {
        return view($this->module . '::home');
    }

    public function stepTwo(Request $request)
    {
        $param = $request->all();
        if (!empty($param['calculate_id'])) {
            $listCalculateGroup = $this->calculateGroupRepository->getAll(['calculate_id' => $param['calculate_id']]);
            $calculate_id = $param['calculate_id'];
            $result = view(
                $this->module . '::partials.step_two',
                compact('listCalculateGroup', 'calculate_id')
            )->render();

            return response()->json([
                'succes' => true,
                'result' => $result
            ]);
        }
    }

    public function stepThree(Request $request)
    {
        $param = $request->all();

        if (!empty($param['category_id']) && !empty($param['calculate_id']) && !empty($param['group_id'])) {
            $groupIds = $listCalculateGroup = $money = $fixedPrice = $checkService = $serviceCalculateIds = $listServiceCategoryPercentage = [];
            $option = [
                'category_id' => $param['category_id'],
                'group_id' => $param['group_id']
            ];
            $groupCategory = $this->groupCategoryRepository->getDetail($option);

            $maxMoney = 0;
            if ($param['calculate_id'] == 1) {
                $type = 'one_home';
                if (!empty($groupCategory)) {
                    $maxMoney = $groupCategory->max_money;
                }
            } else {
                $type = 'care_facility';
            }
            $listPercentageBurden = $this->percentageBurdenCategoryRepository->getAll(['category_id' => $param['category_id']]);
            $listServiceCategoryPercentage = $this->serviceCategoryPercentageRepository->getAll([
                'category_manage_id' => $param['category_id'],
                'type' => $type
            ]);

            foreach ($listServiceCategoryPercentage as $key => $item) {
                if (!empty($item->service)) {
                    if ($item->service->group_id != 0) {
                        $groupIds[] = $item->service->group_id;
                    } else {
                        $serviceCalculateIds[] = $item->service->id;
                    }
                }
                $money[$item['category_id']][$item['service_calculate_id']] = $item['money'];
                $fixedPrice[$item['category_id']][$item['service_calculate_id']] = $item['fixed_price'];
                $checkService[$item['category_id']][$item['service_calculate_id']] = $item;
            }


            if (!empty($groupIds)) {
                $option = [
                    'group_ids' => $groupIds,
                    'category_id' => $param['category_id'],
                ];
                $listCalculateGroup = $this->serviceGroupCategoryRepository->getAll($option);
            } else {
                $listServiceCategoryPercentage = $this->serviceCategoryPercentageRepository->getAll([
                    'serviceCalculateIds' => $serviceCalculateIds,
                    'category_manage_id' => $param['category_id'],
                    'type' => $type
                ]);
            }

            $category = $this->categoryService->find($param['category_id']);
            $calculate_id = getListCalculate()[$param['calculate_id']];
            $numberCalculate = $param['calculate_id'];

            if (!empty($listPercentageBurden) || !empty($listCalculateGroup) || !empty($listService)) {
                $resultStepThree = view(
                    $this->module . '::partials.step_three',
                    compact('listPercentageBurden')
                )->render();

                $resultStepFour = view(
                    $this->module . '::partials.step_four',
                    compact(
                        'listCalculateGroup',
                        'category',
                        'calculate_id',
                        'money',
                        'fixedPrice',
                        'checkService',
                        'listServiceCategoryPercentage',
                        'maxMoney',
                        'numberCalculate'
                    )
                )->render();

                return response()->json([
                    'succes' => true,
                    'resultStepThree' => $resultStepThree,
                    'resultStepFour' => $resultStepFour,
                ]);
            }
        }
    }
}
