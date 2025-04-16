<?php

namespace Modules\Cms\Product\Controllers;

use App\Common\Response;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\KeyWords;
use App\Repositories\CategoryKeywordsRepository;
use App\Repositories\DestinationGuideRepository;
use App\Repositories\FactoryRepository;
use App\Repositories\KeyWordsRepository;
use App\Repositories\ProductKeywordsRepository;
use App\Services\CategoryService;
use App\Services\CompanyService;
use App\Services\ProductService;
use Auth;
use Datatables;
use View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $categoryService;
    protected $productService;
    protected $factoryRepository;
    protected $module = '';
    protected $categoryKeywordsRepository;
    protected $keyWordsRepository;
    protected $productKeywordsRepository;
    protected $destinationGuideRepository;

    public function __construct(
        CategoryService $categoryService,
        ProductService $productService,
        FactoryRepository $factoryRepository,
        CategoryKeywordsRepository $categoryKeywordsRepository,
        KeyWordsRepository $keyWordsRepository,
        ProductKeywordsRepository $productKeywordsRepository,
        DestinationGuideRepository $destinationGuideRepository
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->factoryRepository = $factoryRepository;
        $this->categoryKeywordsRepository = $categoryKeywordsRepository;
        $this->keyWordsRepository = $keyWordsRepository;
        $this->productKeywordsRepository = $productKeywordsRepository;
        $this->destinationGuideRepository = $destinationGuideRepository;

        $listCategory = $this->categoryService->getAll(['type' => 'product']);
        $listFactory = $this->factoryRepository->getAll();
        $listDestinationGuide = $this->destinationGuideRepository->getAll();
        
        View::share(compact('listCategory', 'listFactory', 'listDestinationGuide'));
    }

    public function index()
    {
        return view('product::index');
    }

    public function create()
    {
        return view('product::create');
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $result = $this->productService->create($data);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if ($result) {
            if (!empty($data['keyWord_id'])) {
                foreach ($data['keyWord_id'] as $key => $item) {
                    $datakeyWord[] = [
                        'product_id' => $result->id,
                        'key_words_id' => $item,
                        'category_id' => intval($data['category_id']),
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
                $this->productKeywordsRepository->insert($datakeyWord);
            }
            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function edit($id)
    {
        $product = $this->productService->find($id);
        
        $keyWords = [];
        if (!empty($product->keyWords)) {
            foreach ($product->keyWords as $key => $item) {
                $keyWords[] = $item->key_words_id;
            }
        }
        $keyWordsIds = $this->categoryKeywordsRepository->getAll(['category_ids' => $product->category->category_id]);      
        $listKeyWords = $this->keyWordsRepository->getAll(['ids' => $keyWordsIds]);
        return view('product::edit', compact('product', 'keyWords', 'listKeyWords'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->productService->update($data, $id);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if ($result) {
            if (!empty($data['keyWord_id'])) {
                foreach ($data['keyWord_id'] as $key => $item) {
                    $datakeyWord[] = [
                        'product_id' => $id,
                        'key_words_id' => $item,
                        'category_id' => intval($data['category_id']),
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
                $this->productKeywordsRepository->deleteCategory(['product_id' => $id]);
                $this->productKeywordsRepository->insert($datakeyWord);
            } else {
                $this->productKeywordsRepository->deleteCategory(['product_id' => $id]);
            }

            return redirect()->back()->with('success', __('product::messages.success'));
        }
        return redirect()->back()->withErrors(__('product::messages.failed'));
    }

    public function destroy($id)
    {
        return $this->productService->destroy($id);
    }

    public function ajax(Request $request)
    {
        return $this->productService->getAjax($request);
    }

    public function changeSort(Request $request)
    {
        return $this->productService->changeSort($request);
    }

    public function getKeyWords(Request $request)
    {
        $param = $request->all();
        $sortPost = $arrayPostsIds = [];
        if (!$param['id']) {
            return;
        }
        $category = $this->categoryService->find($param['id']);
        $keyWordsIds = $this->categoryKeywordsRepository->getAll(['category_ids' => $category->id]);      
        $listKeyWords = $this->keyWordsRepository->getAll(['ids' => $keyWordsIds]);
        
        $listKeyWords = view('product::list_key_words', compact('listKeyWords'))->render();
        
        $data = [
            'listKeyWords' => $listKeyWords
        ];

        return Response::success('', $data);
    }
}
