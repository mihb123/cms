<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use App\Models\ServiceCalcute;
use App\Models\ServiceCategoryPercentage;
use Datatables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceCalcuteRepository
{
    protected $model;
    protected $productCategoryRepository;
    protected $serviceCategoryPercentageRepository;
    const PUBLIC = 1;

    public function __construct(
        ServiceCalcute $model,
        ServiceCategoryPercentageRepository $serviceCategoryPercentageRepository
    ) {
        $this->model = $model;
        $this->serviceCategoryPercentageRepository = $serviceCategoryPercentageRepository;
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
        if (isset($option['group_id'])) {
            return $data->where('group_id', $option['group_id'])->where('status', self::PUBLIC)->pluck('id')->toArray();
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
        $param = $request->all();
        $request = $request->except(['_token', '_method', 'files', 'category_id']);
        $now = date('Y-m-d H:i:s');
        $request['sort'] = $now;
        try {
            $service = $this->model->create($request);
            $this->createServiceGroupPercentage($param, $service->id, $now);
            DB::commit();
            return $service;
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function createServiceGroupPercentage($request, $service_id, $now)
    {
        $data = [];
        if (!empty($request) && !empty($request['category_id'])) {
            foreach ($request['category_id'] as $key => $category) {
                $data[] = [
                    'service_calculate_id' => $service_id,
                    'category_id' => $category,
                    'type' => !empty($request['group_id']) ? 'one_home' : 'care_facility',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->serviceCategoryPercentageRepository->insert($data);
        }
    }

    public function update($request, $id)
    {
        $param = $request->all();
        $request = $request->except(['_token', '_method', 'files', 'category_id']);
        try {
            $result = $this->model->where('id', $id)->update($request);
            $this->deleteServiceGroupPercentage($param, $id);
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function deleteServiceGroupPercentage($param, $id)
    {
        $now = date('Y-m-d H:i:s');
        $query = ServiceCategoryPercentage::query()->where(['service_calculate_id' => $id])->delete();
        $this->createServiceGroupPercentage($param, $id, $now);
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        ServiceCategoryPercentage::query()->where(['service_calculate_id' => $id])->delete();
        return $result->delete();
    }

    public function getAjax($request)
    {
        $queryCate = $this->model::query();
        return Datatables::eloquent($queryCate)
            ->filter(function ($query) {
                $query->where('group_id', '!=', 0)->orderBy('sort', 'desc');
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
            ->editColumn('title', function (ServiceCalcute $node) {
                return $node->title;
            })
            ->editColumn('type', function (ServiceCalcute $node) {
                return "One's Home";
            })
            ->editColumn('status', function (ServiceCalcute $node) {
                return CommonHelper::getMarkupStatus($node, 'calculate');
            })
            ->editColumn('sort', function (ServiceCalcute $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/calculate-service/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (ServiceCalcute $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (ServiceCalcute $node) {
                return self::getMarkupAction($node, 'calculate-service');
            })
            ->rawColumns(['title', 'type', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title', 'type', 'status', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getAjaxCare($request)
    {
        $queryCate = $this->model::query();
        return Datatables::eloquent($queryCate)
            ->filter(function ($query) {
                $query->where(['group_id' => 0])->orderBy('sort', 'desc');
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
            ->editColumn('title', function (ServiceCalcute $node) {
                return $node->title;
            })
            ->editColumn('type', function (ServiceCalcute $node) {
                return "Care Facility";
            })
            ->editColumn('status', function (ServiceCalcute $node) {
                return CommonHelper::getMarkupStatus($node, 'calculate');
            })
            ->editColumn('sort', function (ServiceCalcute $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/calculate-service-care/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (ServiceCalcute $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (ServiceCalcute $node) {
                return self::getMarkupAction($node, 'calculate-service-care');
            })
            ->rawColumns(['title', 'type', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title', 'type', 'status', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module)
    {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit', $data->id) . '" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <form action="' . route(
            $module . '.destroy',
            $data->id
        ) . '" id="form-delete-' . $data->id . '">';
        $htmlFrom .= csrf_field();
        $htmlFrom .= '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-google btn-sm delete-action">
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
                $option = [
                    'service_calculate_id' => $id,
                    'sort' => $request->get('sort')
                ];

                $this->serviceCategoryPercentageRepository->updateSort($option);
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }
}
