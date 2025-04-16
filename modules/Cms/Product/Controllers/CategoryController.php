<?php

namespace Modules\Cms\Product\Controllers;

use App\Http\Requests\ProductCategory\CreateRequest;
use App\Http\Requests\ProductCategory\UpdateRequest;
use App\Repositories\CategoryKeywordsRepository;
use App\Repositories\DestinationGuideRepository;
use App\Repositories\GroupCategoryRepository;
use App\Repositories\GroupRepository;
use App\Repositories\KeyWordsRepository;
use App\Services\CategoryService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $groupService;
    protected $groupRepository;
    protected $groupCategoryRepository;
    protected $module = '';
    protected $keyWordsRepository;
    protected $categoryKeywordsRepository;
    protected $destinationGuideRepository;

    public function __construct(
        CategoryService $categoryService,
        GroupRepository $groupRepository,
        GroupCategoryRepository $groupCategoryRepository,
        KeyWordsRepository $keyWordsRepository,
        CategoryKeywordsRepository $categoryKeywordsRepository,
        DestinationGuideRepository $destinationGuideRepository
    ) {
        $this->categoryService = $categoryService;
        $this->groupRepository = $groupRepository;
        $this->groupCategoryRepository = $groupCategoryRepository;
        $this->keyWordsRepository = $keyWordsRepository;
        $this->categoryKeywordsRepository = $categoryKeywordsRepository;
        $this->destinationGuideRepository = $destinationGuideRepository;
        $listDestinationGuide = $this->destinationGuideRepository->getAll();

        $listGroupKeyWords = $this->groupRepository->getAll(['type' => 'key-words']);
        $listKeyWords = $this->keyWordsRepository->getAll();

        View::share(compact('listGroupKeyWords', 'listKeyWords', 'listDestinationGuide'));
    }

    public function index()
    {
        return view('product::category.index');
    }

    public function create()
    {
        return view('product::category.create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $data['module'] = 'product';
        $result = $this->categoryService->create($data);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if ($result) {
            if (!empty($data['keyWord'])) {
                foreach ($data['keyWord'] as $key => $item) {
                    $datakeyWord[] = [
                        'category_id' => $result->id,
                        'key_words_id' => $item,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
                $this->categoryKeywordsRepository->insert($datakeyWord);
            }
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $data = $this->categoryService->find($id);
        $keyWords = [];
        if (!empty($data->keyWords)) {
            foreach ($data->keyWords as $key => $item) {
                $keyWords[] = $item->key_words_id;
            }
        }
        return view('product::category.edit', compact('data', 'keyWords'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $data['module'] = 'product';
        $result = $this->categoryService->update($data, $id);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if ($result) {
            if (!empty($data['keyWord'])) {
                foreach ($data['keyWord'] as $key => $item) {
                    $datakeyWord[] = [
                        'category_id' => $id,
                        'key_words_id' => $item,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
                $this->categoryKeywordsRepository->deleteCategory(['category_id' => $id]);
                $this->categoryKeywordsRepository->insert($datakeyWord);
            } else {
                $this->categoryKeywordsRepository->deleteCategory(['category_id' => $id]);
            }

            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->categoryService->getAjaxProduct($request, 'product', 'product-category');
    }

    public function changeSort(Request $request)
    {
        return $this->categoryService->changeSort($request);
    }

    public function display(Request $request)
    {
        return $this->categoryService->display($request);
    }
}
