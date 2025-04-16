<?php

namespace Modules\Cms\Calculate\Controllers;

use App\Common\Response;
use App\Http\Requests\ServiceGroup\CreateRequest;
use App\Http\Requests\ServiceGroup\UpdateRequest;
use App\Repositories\CalculateGroupRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\GroupCategoryRepository;
use App\Repositories\ServiceCalcuteRepository;
use App\Repositories\ServiceCategoryPercentageRepository;
use App\Repositories\ServiceGroupCategoryRepository;
use App\Services\CategoryService;
use App\Services\GroupService;
use Auth;
use Datatables;
use Illuminate\Http\Request;
use View;

class SettingMoneyController extends Controller
{
    protected $groupService;
    protected $categoryService;
    protected $categoryRepository;
    protected $serviceCategoryPercentageRepository;
    protected $groupCategoryRepository;
    protected $calculateGroupRepository;

    protected $module = '';

    public function __construct(
        GroupService $groupService,
        CategoryService $categoryService,
        CalculateGroupRepository $calculateGroupRepository,
        CategoryRepository $categoryRepository,
        ServiceCategoryPercentageRepository $serviceCategoryPercentageRepository,
        GroupCategoryRepository $groupCategoryRepository
    ) {
        $this->groupService = $groupService;
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
        $this->serviceCategoryPercentageRepository = $serviceCategoryPercentageRepository;
        $this->groupCategoryRepository = $groupCategoryRepository;
        $this->calculateGroupRepository = $calculateGroupRepository;
        $listCalculateGroup = $this->calculateGroupRepository->getAll(['calculate_id' => 1])->toArray();
  
        $listGroup = $this->groupService->getAll(['ids' => array_column($listCalculateGroup, 'group_id')]);

        View::share(compact('listGroup'));
    }

    public function index()
    {
        return view('calculate::setting_money.index');
    }

    public function create()
    {
        return view('calculate::setting_money.create');
    }

    public function getCategory(Request $request)
    {
        $html = '';
        $maxMoney = $categoryIds = [];
        $param = $request->all();
        if (!$param['group_id']) {
            return;
        }
        $listGroupCategory = $this->groupCategoryRepository->getAll(['group_id' => $param['group_id']]);

        if (!empty($listGroupCategory)) {
            foreach ($listGroupCategory as $key => $value) {
                $maxMoney[$value->group_id][$value->category_id] = $value->max_money;
                $categoryIds[] = $value->category_id;
            }

            $listCategory = $this->categoryRepository->getAll(['ids' => $categoryIds]);

            $html = view('calculate::setting_money.list_category', [
                'listCategory' => $listCategory ?? [],
                'group_id' => $param['group_id'],
                'type' => 'one_home',
                'maxMoney' => $maxMoney
            ])->render();
        }

        return Response::success('', $html);
    }

    public function changeMoney(Request $request)
    {
        $param = $request->all();

        if (!$param['category_id'] && !$param['group_id']) {
            return;
        }
        $option = [
            'category_id' => $param['category_id'],
            'group_id' => $param['group_id']
        ];

        return $this->groupCategoryRepository->updateMoney($option, $param);
    }
}
