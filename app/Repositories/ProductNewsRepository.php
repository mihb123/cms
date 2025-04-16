<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Models\ProductNews;
use App\Models\ProductNewsCategory;
use Datatables;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductNewsRepository
{
    protected $model;
    protected $productNewsCategoryRepository;
    const PUBLIC = 1;
    public function __construct(
        ProductNews $model,
        ProductNewsCategoryRepository $productNewsCategoryRepository
    ) {
        $this->model = $model;
        $this->productNewsCategoryRepository = $productNewsCategoryRepository;
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

        if (isset($option['type']) && isset($option['limit'])) {
            return $data->limit($option['limit'])->where(['type'=> $option['type']])->orderBy('sort', 'desc')->get();
        }

        if (isset($option['limit'])) {
            return $data->limit($option['limit'])->orderBy('sort', 'desc')->get();
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
        $productNews = $this->model->create($data);
        $this->saveCategory($request, $productNews);
        return $productNews;
    }

    public function update($data, $id, $request)
    {
        $result = $this->model->where('id', $id)->update($data);
        $productNews = $this->find($id);
        $this->deleteProductCategory($id);
        $this->saveCategory($request, $productNews);
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
            ->editColumn('title', function (ProductNews $node) {
                return $node->title;
            })
            ->editColumn('sort', function (ProductNews $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/product-news/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->addColumn('display', function (ProductNews $node) {
                $checked = isset($node->type) && $node->type == 1 ? 'checked' : '';
                return '<input type="checkbox" ' . $checked . '  onclick="displayTop(\'' . $node->id . '\', this.getAttribute(\'data-router\'), this)" data-router="/product-news/display" class="form-control" style="height:unset" />';
            })
            ->editColumn('created_at', function (ProductNews $node) {
                return $node->created_at;
            })

            ->addColumn('action', function (ProductNews $node) {
                return self::getMarkupAction($node, 'product-news');
            })
            ->rawColumns(['title', 'sort', 'display', 'created_at', 'action'])
            ->only(['id', 'title', 'sort',  'display', 'created_at', 'action'])
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

    public function display($request)
    {
        $id = $request->get('id');
        if (validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->find($id);

        if (!empty($result)) {
            $result->type = intval($request->get('type'));
            if ($result->save()) {
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }

    public function changeSort($request)
    {
        $id = $request->get('id');
        if (validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->find($id);

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

    public function saveCategory($request, $productNews)
    {
        if (isset($request['category_id']) && $request['category_id']) {
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            $data = [
                'category_id' => intval($request['category_id']),
                'product_news_id' => $productNews->id,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        $this->productNewsCategoryRepository->create($data);
    }

    public function deleteProductCategory($id)
    {
        $data = ProductNewsCategory::query();
        if ($id) {
            $data = $data->where('product_news_id', $id);
        }
        return $data->delete();
    }

    public function paginationHome($page, $perPage)
    {
        return $this->model::orderBy('sort', 'desc')->paginate($perPage, ['*'], 'page', $page);
//        return $this->model::skip(($page - 1) * $perPage)->take($perPage)->orderBy('sort', 'desc')->get();
    }
}
