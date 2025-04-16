<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use Datatables;
use App\Models\PercentageBurden;
use App\Models\PercentageBurdenCategory;
use Illuminate\Support\Str;

class PercentageBurdenRepository
{
    protected $model;
    protected $percentageBurdenCategoryRepository;
    const PUBLIC = 1;

    public function __construct(
        PercentageBurden $model,
        PercentageBurdenCategoryRepository $percentageBurdenCategoryRepository
    ) {
        $this->model = $model;
        $this->percentageBurdenCategoryRepository = $percentageBurdenCategoryRepository;
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

        if (isset($option['limit'])) {
            return $data->limit($option['limit'])->orderBy('sort', 'desc')->get();
        }
        $data = $data->where('status', self::PUBLIC);
        return $data = $data
            ->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($request)
    {
        $requestNew = $request->except(['_token', '_method', 'category_id']);
        $percentageBurden = $this->model->create($requestNew);
        $this->createPercentageBurdenCategory($percentageBurden, $request);
        return $percentageBurden;
    }

    public function update($request, $id)
    {
        $requestNew = $request->except(['_token', '_method', 'category_id']);
        $result = $this->model->where('id', $id)->update($requestNew);
        if (!empty($request['category_id'])) {
            $percentageBurden = $this->find($id);
            $this->deletePercentageBurdenCategory($percentageBurden->id);

            $this->createPercentageBurdenCategory($percentageBurden, $request);
        }
        return $result;
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        $percentageBurden = $this->find($id);
        $this->deletePercentageBurdenCategory($percentageBurden->id);
        return $result->delete();
    }

    public function getAjax($request)
    {
        $queryCate = $this->model::query();
        return Datatables::eloquent($queryCate)
            ->filter(function ($query) {
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
            ->editColumn('title', function (PercentageBurden $node) {
                return $node->title;
            })
            ->editColumn('percentage', function (PercentageBurden $node) {
                return $node->percentage;
            })

            ->editColumn('status', function (PercentageBurden $node) {
                return CommonHelper::getMarkupStatus($node, 'calculate');
            })

            ->editColumn('created_at', function (PercentageBurden $node) {
                return $node->created_at;
            })

            ->addColumn('action', function (PercentageBurden $node) {
                return self::getMarkupAction($node, 'percentage-burden');
            })
            ->rawColumns(['title', 'percentage', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'percentage', 'status', 'created_at', 'action'])
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

    public function createPercentageBurdenCategory($percentageBurden, $request)
    {
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if (!empty($request['category_id'])) {
            foreach ($request['category_id'] as $key => $category) {
                $data[] = [
                    'percentage_burden_id' => $percentageBurden->id,
                    'category_id' => $category,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->percentageBurdenCategoryRepository->insert($data);
        }
    }

    public function deletePercentageBurdenCategory($id)
    {
        $data = PercentageBurdenCategory::query();

        if ($id) {
            $data = $data->where('percentage_burden_id', $id);
        }

        return $data->delete();
    }
}
