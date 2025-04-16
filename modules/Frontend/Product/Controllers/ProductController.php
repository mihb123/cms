<?php

namespace Modules\Frontend\Product\Controllers;

use App\Models\ProductNews;
use App\Repositories\BannersRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\CompanyServiceRepository;
use App\Repositories\KeyWordsRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductKeywordsRepository;
use App\Repositories\ProductNewsRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ServiceRepository;
use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\PostsTopicService;
use App\Services\PostUsefulService;
use Illuminate\Http\Request;
use View;

//ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    protected $module = '';
    protected $topicUsefulService;
    protected $menuService;
    protected $noticeService;
    protected $productRepository;
    protected $companyRepository;
    protected $categoryRepository;
    protected $productNewsRepository;
    protected $bannersRepository;
    protected $productCategoryRepository;
    protected $postsTopicService;
    protected $serviceRepository;
    protected $companyServiceRepository;
    protected $keyWordsRepository;
    protected $productKeywordsRepository;

    //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
    const PUBLIC = 1;   //1: 公開ステータス
    
    public function __construct(
        PostUsefulService $topicUsefulService,
        MenuService $menuService,
        NoticeService $noticeService,
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        CompanyRepository $companyRepository,
        ProductNewsRepository $productNewsRepository,
        BannersRepository $bannersRepository,
        ProductCategoryRepository $productCategoryRepository,
        PostsTopicService $postsTopicService,
        ServiceRepository $serviceRepository,
        CompanyServiceRepository $companyServiceRepository,
        KeyWordsRepository $keyWordsRepository,
        ProductKeywordsRepository $productKeywordsRepository
    ) {
        $this->topicUsefulService = $topicUsefulService;
        $this->menuService = $menuService;
        $this->noticeService = $noticeService;
        $this->productRepository = $productRepository;
        $this->companyRepository = $companyRepository;
        $this->productNewsRepository = $productNewsRepository;
        $this->categoryRepository = $categoryRepository;
        $this->bannersRepository = $bannersRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->postsTopicService = $postsTopicService;
        $this->serviceRepository = $serviceRepository;
        $this->companyServiceRepository = $companyServiceRepository;
        $this->keyWordsRepository = $keyWordsRepository;
        $this->productKeywordsRepository = $productKeywordsRepository;

        $listNotice = $this->init()['listNotice'];
        $listMenu = $this->init()['listMenu'];
        $listUseful = $this->init()['listUseful'];
        $this->module = 'product-frontend';
        $moduleProduct = true;
        $classProduct = 'pd-tb-0 pd-sp-0';
        $class = 'cms4';
        $listService = $this->serviceRepository->getAll(['display' => 1]);
        view::share('module', $this->module);
        view::share(compact(
            'listNotice',
            'listMenu',
            'listUseful',
            'moduleProduct',
            'classProduct',
            'class',
            'listService'
        ));
    }

    public function home()
    {
        $optionProduct = [
            'limit' => 40
        ];
        $optionProductNews = [
            'limit' => 40
        ];
        $optionProductCategory = [
            'type' => 'product',
            'display' => 1
        ];
        $optionProductCategoryNews = [
            'type' => 'product-news',
            'display' => 1
        ];
        $optionProductNewsFeatures = [
            'type' => 1,
            'limit' => 5
        ];
        $optionBannerTop = [
            'position' => 1,
        ];

        $listProduct = $this->productRepository->getall($optionProduct);
        $listProductNew = $this->productNewsRepository->paginationHome(1, 10);
        $listProductNewsFeatures = $this->productNewsRepository->getAll($optionProductNewsFeatures);
        $listProductCategory = $this->categoryRepository->getAll($optionProductCategory);
        $listProductCategoryNews = $this->categoryRepository->getAll($optionProductCategoryNews);
        $banner = $this->bannersRepository->getAll($optionBannerTop);
        $listTopic = $this->postsTopicService->getAll(['position' => 2]);
        $page = 1;

        return view($this->module . '::home', compact(
            'listProduct',
            'listProductNew',
            'listProductCategory',
            'listProductCategoryNews',
            'page',
            'listProductNewsFeatures',
            'banner',
            'listTopic'
        ));
    }

    public function detail($id)
    {
        $optionProductNewsFeatures = [
            'type' => 1,
            'limit' => 5
        ];
        $optionBannerDetail = [
            'position' => 3,
        ];
        $page = 1;
        $product = $this->productRepository->find($id);
        
         //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
        if ($product['status'] <> self::PUBLIC) {
            throw new NotFoundHttpException ("非公開投稿への直接参照");
        }
        
        if (!empty($product->categories)) {
            foreach ($product->categories as $key => $item) {
                $categoryIds[] = $item->id;
            }
            $productIds = $this->productCategoryRepository->getAll(['category_ids' => $categoryIds]);
            $ids = array_diff($productIds, [$id]);
            $productsRelated = $this->productRepository->getAll(['product_related_ids' => $ids]);
        }
        $product->increment('viewer');
        $listCompany = $this->listCompany($product);

        $listProductNewsFeatures = $this->productNewsRepository->getAll($optionProductNewsFeatures);
        $banner = $this->bannersRepository->getAll($optionBannerDetail);

        return view($this->module . '::detail', compact(
            'product',
            'listCompany',
            'page',
            'listProductNewsFeatures',
            'banner',
            'productsRelated'
        ));
    }

    public function list(Request $request)
    {
        $param = $request->all();
        $category = '';
        if (isset($param['category'])) {
            $option = [
                'title' => $param['category'],
            ];
            $category = $this->categoryRepository->getDetail($option);
            if (isset($param['keyWord'])) {
                $optionKeyWord = [
                    'title_user' => $param['keyWord'],
                ];
                $keyWord = $this->keyWordsRepository->getDetail($optionKeyWord);
                $optionProduct = [
                    'category_id' => $category->id,
                    'key_words_id' => $keyWord->id,
                    'pluck' => true
                ];
                $productIds = $this->productKeywordsRepository->getAll($optionProduct);

                $data = $this->productRepository->getAll(['productIds' => $productIds]);
            } else {
                $data = $category->productPagination()->paginate(40);
            }
        } else {
            $data = $this->productRepository->getAll();
        }

        $optionProductCategory = [
            'type' => 'product',
        ];
        $listProductCategory = $this->categoryRepository->getAll($optionProductCategory);
        $optionProductNewsFeatures = [
            'type' => 1,
            'limit' => 5
        ];
        $listProductNewsFeatures = $this->productNewsRepository->getAll($optionProductNewsFeatures);
        $optionBannerList = [
            'position' => 2,
        ];
        $banner = $this->bannersRepository->getAll($optionBannerList);

        return view($this->module . '::list', compact(
            'data',
            'listProductCategory',
            'category',
            'param',
            'listProductNewsFeatures',
            'banner'
        ));
    }

    public function listCompany($product)
    {
        $companyIds = $listCompany = [];
        if ($product->category) {
            foreach ($product->category->listCompany as $key => $items) {
                $companyIds[] = $items->company_id;
            }
            if ($companyIds) {
                $option = [
                    'ids' => array_unique($companyIds)
                ];
                $listCompany = $this->companyRepository->getAll($option);
            }
        }

        return $listCompany;
    }

    public function showListProduct(Request $request)
    {
        $param = $request->all();
        $page = $param['page'];
        $perPage = 10;
        if (isset($param['category'])) {
            $option = [
                'title' => $param['category'],
            ];

            $category = $this->categoryRepository->getDetail($option);

            $listProductNewTab = $category->productNewsPagination($page, $perPage);

            $categoryNew = $category;
            $result = view($this->module . '::partials.ajax.list_product_tab', compact('listProductNewTab', 'page', 'categoryNew'))->render();

            return response()->json([
                'succes' => true,
                'result' => $result
            ]);
        } else {
            $listProductNew = $this->productNewsRepository->paginationHome($page, $perPage);

            $result = view($this->module . '::partials.ajax.list_product_tab_default', compact('listProductNew', 'page'))->render();

            return response()->json([
                'succes' => true,
                'result' => $result
            ]);
        }
    }

    public function showCompany(Request $request)
    {
        $param = $request->all();
        $page = $param['page'];
        $perPage = 10;

        if (isset($param['id_product'])) {
            $product = $this->productRepository->find($param['id_product']);
            
            //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
           if ($product['status'] <> self::PUBLIC) {
               throw new NotFoundHttpException ("非公開投稿への直接参照");
           }

            if (isset($param['ids'])) {
                $id_service = $param['ids'];
                $ids = explode(',', $param['ids']);
            }

            if ($product->category) {
                if (!empty($param['ids'])) {
                    $companyIds = $this->companyServiceRepository->getAll(['service_id' => $ids]);
                } else {
                    foreach ($product->category->listCompany as $key => $items) {
                        $companyIds[] = $items->company_id;
                    }
                }

                $option = [
                    'ids' => $companyIds
                ];
                $listCompany = $this->companyRepository->companyPagination($page, $perPage, $option);

                $result = view($this->module . '::partials.ajax.list_company', compact('listCompany', 'product', 'page'))->render();

                return response()->json([
                    'succes' => true,
                    'result' => $result
                ]);
            }
        }
    }

    public function showCompanyByService(Request $request)
    {
        $param = $request->all();

        $page = $param['page'] ?? 1;
        $perPage = 10;

        if (!empty($param) && !empty($param['ids']) && !empty($param['id_product'])) {
            if (!empty($param['id_checked'])) {
                $id_service = $param['id_checked'];
                $ids = explode(',', $param['id_checked']);
            } else {
                $id_service = $param['ids'];
                $ids = explode(',', $param['ids']);
            }

            $product = $this->productRepository->find($param['id_product']);

            //ステータスが非公開の投稿への参照をNotFoundエラーとする対応を追加。(added by a.u 2024.12.07)
            if ($product['status'] <> self::PUBLIC) {
                throw new NotFoundHttpException ("非公開投稿への直接参照");
            }
            if ($product) {

                $idsCompany = $this->companyServiceRepository->getAll(['service_id' => $ids]);
                $option = [
                    'ids' => array_unique($idsCompany)
                ];

                if (empty($param['page'])) {
                    $listCompany = $this->companyRepository->getAll($option);
                } else {
                    $listCompany = $this->companyRepository->companyPagination($page, $perPage, $option);
                }

                $result = view($this->module . '::partials.ajax.list_company_by_service', compact(
                    'listCompany',
                    'product',
                    'page',
                    'id_service'
                ))->render();

                return response()->json([
                    'succes' => true,
                    'result' => $result
                ]);
            }
        }
    }
}
