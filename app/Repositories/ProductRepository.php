<?php

namespace App\Repositories;

use App\Models\FactoryProduct;
use App\Models\ProductCategory;
use Datatables;
use App\Helpers\CommonHelper;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository
{
    protected $model;
    protected $productCategoryRepository;
    protected $factoryProductRepository;
    const PUBLIC = 1;

    public function __construct(
        Product $model,
        ProductCategoryRepository $productCategoryRepository,
        FactoryProductRepository $factoryProductRepository

    ) {
        $this->model = $model;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->factoryProductRepository = $factoryProductRepository;
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['ids'])) {
            $data = $data->whereIn('id', $option['ids']);
        }
        if (isset($option['productIds'])) {
            $data = $data->whereIn('id', $option['productIds']);
        }

        if (isset($option['limit'])) {
            return $data->limit($option['limit'])->orderBy('sort', 'desc')->get();
        }

        if (isset($option['product_related_ids'])) {
            return $data->whereIn('id', $option['product_related_ids'])
                ->orderBy('viewer', 'desc')
                ->take(10)
                ->get();
        }
        return $data = $data
            ->orderBy('sort', 'desc')
            ->paginate(40);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
    {
        $product = $this->model->create($data);
        $this->saveCategory($request, $product);
        $this->saveFactory($request, $product);
        return $product;
    }

    public function update($data, $id, $request)
    {
        $result = $this->model->where('id', $id)->update($data);
        $product = $this->find($id);
        $this->deleteProductCategory($id);
        $this->saveCategory($request, $product);
        $this->deleteFactoryProduct($id);
        $this->saveFactory($request, $product);
        return $result;
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        return $result->delete();
    }

    public function getAjax($request)
    {
        $queryCate = $this->model::query();
        return Datatables::eloquent($queryCate)
            ->filter(function ($query) {
                $query->orderBy('sort', 'desc');
                if ($search = request()->input('search.value')) {
                    $field = 'title';
                    $operator = 'like';

                    if (Str::contains($search, ':')) {
                        list($field, $search) = explode(':', $search);
                    }

                    if (!empty($field)) {
                        if ($field == 'id') {
                            $field = 'id';
                            $operator = '=';
                        } else {
                            $search = '%' . $search . '%';
                        }

                        $field = trim($field);
                        $search = trim($search);
                        $query->where($field, $operator, $search);
                    }
                }
            })
            ->editColumn('title', function (Product $node) {
                return $node->title;
            })
            ->editColumn('category', function (Product $node) {
                if (!empty($node->productCategory) && !empty($node->productCategory->category) && !empty($node->productCategory->category->title)) {
                    return '<span class="btn btn-default">' . $node->productCategory->category->title . '</span>';
                }
            })
            ->editColumn('viewer', function (Product $node) {
                return $node->viewer;
            })

            ->editColumn('sort', function (Product $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/product/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (Product $node) {
                return $node->created_at;
            })

            ->addColumn('action', function (Product $node) {
                return self::getMarkupAction($node, 'product');
            })
            ->rawColumns(['title', 'category', 'viewer', 'sort', 'created_at', 'action'])
            ->only(['id', 'title', 'category', 'viewer', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module)
    {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit',  $data->id) . '" class="btn btn-warning btn-sm mr-2">
                        <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <form action="' . route($module . '.destroy', $data->id) . '" id="form-delete-' . $data->id . '">';
        $htmlFrom .=          csrf_field();
        $htmlFrom .=          '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-google btn-sm delete-action">
                                <i class="fas fa-trash"></i>
                            </a>
                        </form>
                    </div>';

        return $htmlFrom;
    }

    public function changeSort($request)
    {
        $id = $request->get('id');
        if (validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->find($id);
        $data = [];
        if (!empty($result)) {
            $result->sort = $request->get('sort');
            if ($result->save()) {
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }

    public function saveCategory($request, $product)
    {
        if (isset($request['category_id']) && $request['category_id']) {
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            $data = [
                'category_id' => intval($request['category_id']),
                'product_id' => $product->id,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $this->productCategoryRepository->create($data);
        }
    }

    public function deleteProductCategory($id)
    {
        $data = ProductCategory::query();
        if ($id) {
            $data = $data->where('product_id', $id);
        }
        return $data->delete();
    }

    public function saveFactory($request, $product)
    {
        if (isset($request['factory_id']) && $request['factory_id']) {
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            $data = [
                'factory_id' => intval($request['factory_id']),
                'product_id' => $product->id,
                'created_at' => $now,
                'updated_at' => $now,
            ];

            $this->factoryProductRepository->create($data);
        }
    }

    public function deleteFactoryProduct($id)
    {
        $data = FactoryProduct::query();
        if ($id) {
            $data = $data->where('product_id', $id);
        }
        return $data->delete();
    }
}
