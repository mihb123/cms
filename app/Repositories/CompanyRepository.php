<?php

namespace App\Repositories;

use App\Models\CompanyCategory;
use App\Models\CompanyService;
use App\Services\CompanyCategoryService;
use Datatables;
use App\Helpers\CommonHelper;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanyRepository
{
    protected $model;
    protected $companyCategoryService;
    protected $companyServiceRepository;
    const PUBLIC = 1;

    public function __construct(
        Company $model,
        CompanyCategoryService $companyCategoryService,
        CompanyServiceRepository $companyServiceRepository
    ) {
        $this->model = $model;
        $this->companyCategoryService = $companyCategoryService;
        $this->companyServiceRepository = $companyServiceRepository;
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

        if (isset($option['ids'])) {
            return $data->whereIn('id', $option['ids'])->paginate(10);
        }

        return $data = $data
            ->orderBy('sort', 'desc')
            ->get();
    }

    public function companyPagination($page, $perPage, $option)
    {
        return $this->model::whereIn('id', $option['ids'])->paginate($perPage);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
    {
        $company = $this->model->create($data);
        $this->saveCategoryAndService($request, $company);

        return $company;
    }

    public function update($data, $id, $request)
    {
        $result = $this->model->where('id', $id)->update($data);
        $company = $this->find($id);
        $this->deleteCompanyCategoryAndService($id);
        $this->saveCategoryAndService($request, $company);

        return $result;
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        $this->deleteCompanyCategoryAndService($id);
        return $result->delete();
    }

    public function getAjax($request)
    {
        $queryCate = $this->model::query();
        return Datatables::eloquent($queryCate)
            ->filter(function ($query) {
                if ($search = request()->input('search.value')) {
                    $field = 'name';
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
            ->editColumn('name', function (Company $node) {
                return $node->name;
            })
            ->editColumn('created_at', function (Company $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Company $node) {
                return self::getMarkupAction($node, 'company');
            })
            ->rawColumns(['name', 'created_at', 'action'])
            ->only(['id', 'name', 'created_at', 'action'])
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

    public function saveCategoryAndService($request, $company)
    {
        if (isset($request['category_id']) && $request['category_id']) {
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            foreach ($request['category_id'] as $key => $category) {
                $data[] = [
                    'category_id' => $category,
                    'company_id' => $company->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->companyCategoryService->insert($data);
        }

        if (isset($request['service_id']) && $request['service_id']) {
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            foreach ($request['service_id'] as $key => $service) {
                $dataService[] = [
                    'service_id' => $service,
                    'company_id' => $company->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->companyServiceRepository->insert($dataService);
        }
    }

    public function deleteCompanyCategoryAndService($id)
    {
        $data = CompanyCategory::query();
        $dataService = CompanyService::query();
        if ($id) {
            $data = $data->where('company_id', $id);
            $dataService = $dataService->where('company_id', $id);
        }
        $data->delete();
        $dataService->delete();
        return true;
    }
}
