<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use App\Models\ProductGroup;
use App\Models\ProductGroupCategory;
use Datatables;
use Illuminate\Support\Str;

class ProductGroupRepository
{
    protected $model;
    protected $productGroupCategoryRepository;
    const PUBLIC = 1;

    public function __construct(
        ProductGroup $model,
        ProductGroupCategoryRepository $productGroupCategoryRepository
    ) {
        $this->model = $model;
        $this->productGroupCategoryRepository = $productGroupCategoryRepository;
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['limit']) && isset($option['display'])) {
            return $data->limit($option['limit'])
                ->where('display', intval($option['display']))
                ->where('status', self::PUBLIC)
                ->orderBy('sort', 'desc')
                ->get();
        }

        $data = $data->where('status', self::PUBLIC);

        return $data = $data->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($request)
    {
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        $requestOld = $request->all();
        $request = $request->except(['_token', '_method', 'category_id']);
        $request['sort'] = $now;
        $group = $this->model->create($request);
        $this->saveGroupCategory($requestOld, $group);
        return $group;
    }

    public function update($request, $id)
    {
        $requestOld = $request->all();
        $request = $request->except(['_token', '_method', 'category_id']);
        $result = $this->model->where('id', $id)->update($request);
        $group = $this->find($id);
        $this->deleteGroupCategory($id);
        $this->saveGroupCategory($requestOld, $group);
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
            ->editColumn('title', function (ProductGroup $node) {
                return $node->title;
            })
            ->editColumn('sort', function (ProductGroup $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/product-group-category/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->addColumn('display', function (ProductGroup $node) {
                $checked = isset($node->display) && $node->display == 1 ? 'checked' : '';
                return '<input type="checkbox" ' . $checked . '  onclick="displayTop(\'' . $node->id . '\', this.getAttribute(\'data-router\'), this)" data-router="/product-group-category/display" class="form-control" style="height:unset" />';
            })
            ->editColumn('status', function (ProductGroup $node) {
                return CommonHelper::getMarkupStatus($node, 'product');
            })
            ->editColumn('created_at', function (ProductGroup $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (ProductGroup $node) {
                return self::getMarkupAction($node, 'product-group-category');
            })
            ->rawColumns(['title', 'sort', 'display', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'sort', 'display', 'status', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module)
    {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit', $data->id) . '" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <form action="' . route($module . '.destroy',
                $data->id) . '" id="form-delete-' . $data->id . '">';
        $htmlFrom .= csrf_field();
        $htmlFrom .= '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-google btn-sm delete-action">
                                <i class="fas fa-trash"></i>
                              </a>
                        </form>
                    </div>';

        return $htmlFrom;
    }

    public function insert($data)
    {
        return $this->model->insert($data);
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

    public function display($request)
    {
        $id = $request->get('id');
        if (validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->find($id);

        if (!empty($result)) {
            $result->display = intval($request->get('type'));
            if ($result->save()) {
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }

    public function saveGroupCategory($request, $group)
    {
        if (isset($request['category_id']) && $request['category_id']) {
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            foreach ($request['category_id'] as $key => $category) {
                $data[] = [
                    'category_id' => $category,
                    'product_group_id' => $group->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->productGroupCategoryRepository->insert($data);
        }
    }

    public function deleteGroupCategory($id)
    {
        $data = ProductGroupCategory::query();
        if ($id) {
            $data = $data->where('product_group_id', $id);
        }

        return $data->delete();
    }
}
