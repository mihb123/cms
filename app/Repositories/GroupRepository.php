<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Group;
use App\Models\GroupCategory;
use App\Services\GroupCategoryService;
use Datatables;
use App\Helpers\CommonHelper;
use App\Models\CalculateGroup;
use App\Models\ServiceGroupCategory;
use Illuminate\Support\Str;

class GroupRepository
{
    protected $model;
    protected $groupCategoryService;
    protected $groupCategory;
    protected $calculateGroup;
    protected $serviceGroupCategory;
    const PUBLIC = 1;

    public function __construct(
        Group $model,
        GroupCategoryService $groupCategoryService,
        GroupCategory $groupCategory,
        CalculateGroup $calculateGroup,
        ServiceGroupCategory $serviceGroupCategory
    ) {
        $this->model = $model;
        $this->groupCategoryService = $groupCategoryService;
        $this->groupCategory = $groupCategory;
        $this->calculateGroup = $calculateGroup;
        $this->serviceGroupCategory = $serviceGroupCategory;
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
            return $data->whereIn('id', $option['ids'])->where('status', self::PUBLIC)->get();
        }
        if (isset($option['type'])) {
            $data = $data->where('type', $option['type']);
        } else {
            $data = $data->where('type', 'tag');
        }

        $data = $data->where('status', self::PUBLIC);
        return $data = $data
            ->orderBy('sort', 'desc')
            ->get();
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();
        if (isset($option['title'])) {
            $data = $data->where('title', $option['title']);
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        return $data = $data->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
    {
        $group = $this->model->create($data);
        if (!empty($request['calculate_id'])) {
            $this->createCalculateGroup($group, $request);
        } elseif (!empty($data['type']) && $data['type'] == "calculate-service") {
            $this->createServiceCategory($group, $request);
        }
        return $group;
    }

    public function update($data, $id, $request)
    {
        $this->createGroupCategory($id, $data);
        $group = $this->find($id);
        if (!empty($request['calculate_id'])) {
            $this->deleteCalculateGroup($group->id);
            $this->createCalculateGroup($group, $request);
        } elseif (!empty($data['type']) && $data['type'] == "calculate-service") {
            $this->deleteServiceCategory($group->id);
            $this->createServiceCategory($group, $request);
        }
        return $this->model->where('id', $id)->update($data);
    }

    public function createCalculateGroup($group, $request)
    {
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        $data[] = [
            'calculate_id' => $request['calculate_id'],
            'group_id' => $group->id,
            'sort' => $group->sort,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $this->calculateGroup->insert($data);
    }

    public function createServiceCategory($group, $request)
    {
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if (!empty($request['category_id'])) {
            foreach ($request['category_id'] as $key => $item) {
                $data[] = [
                    'category_id' => $item,
                    'group_id' => $group->id,
                    'sort' => $group->sort,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        $this->serviceGroupCategory->insert($data);
    }

    public function deleteCalculateGroup($id)
    {
        $data = $this->calculateGroup::query();

        if ($id) {
            $data = $data->where('group_id', $id);
        }

        return $data->delete();
    }

    public function deleteServiceCategory($id)
    {
        $data = $this->serviceGroupCategory::query();

        if ($id) {
            $data = $data->where('group_id', $id);
        }

        return $data->delete();
    }

    public function createGroupCategory($groupId, $data)
    {
        $groupCategory = $this->groupCategoryService->getAll(['group_id' => $groupId]);
        if ($groupCategory) {
            $group = [];
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            foreach ($groupCategory as $key => $value) {
                $group[] = [
                    'category_id' => $value['category_id'],
                    'group_id' => $groupId,
                    'type' => $data['type'],
                    'sort' => $value['sort'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->deleteGroupCategory($groupId, $data['type']);
            if ($group) {
                $this->groupCategoryService->insert($group);
            }
        }
    }

    public function deleteGroupCategory($id, $type)
    {
        $data = $this->groupCategory::query();

        if ($id) {
            $data = $data->where('group_id', $id);
        }
        $data = $data->where('type', $type);

        return $data->delete();
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        $this->deleteServiceCategory($id);
        $this->deleteCalculateGroup($id);
        return $result->delete();
    }

    public function getAjax($query)
    {
        $queryAdmin = Group::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($query) {
                $query->where('type', 'tag')->orderBy('sort', 'desc');
                if ($search = request()->input('search.value')) {
                    $field = 'title_japan';
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
            ->editColumn('title_japan', function (Group $node) {
                return $node->title_japan;
            })
            ->editColumn('status', function (Group $node) {
                return CommonHelper::getMarkupStatus($node, 'tag');
            })
            ->editColumn('sort', function (Group $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/tag-group/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (Group $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Group $node) {
                return self::getMarkupAction($node, 'tag-group');
            })
            ->rawColumns(['title_japan', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title_japan', 'status', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getAjaxPost($query)
    {
        $queryAdmin = Group::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($queryAdmin) {
                $queryAdmin->where('type', 'posts')->orderBy('sort', 'desc');
                if ($search = request()->input('search.value')) {
                    $field = 'title_japan';
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
                        $queryAdmin->where($field, $operator, $search);
                    }
                }
            })
            ->editColumn('title_japan', function (Group $node) {
                return $node->title_japan;
            })
            ->editColumn('status', function (Group $node) {
                return CommonHelper::getMarkupStatus($node, 'posts');
            })
            ->editColumn('sort', function (Group $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/posts-group/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (Group $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Group $node) {
                return self::getMarkupAction($node, 'posts-group');
            })
            ->rawColumns(['title_japan', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title_japan', 'status', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getAjaxKeyWords($query)
    {
        $queryAdmin = Group::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($queryAdmin) {
                $queryAdmin->where('type', 'key-words')->orderBy('sort', 'desc');
                if ($search = request()->input('search.value')) {
                    $field = 'title_japan';
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
                        $queryAdmin->where($field, $operator, $search);
                    }
                }
            })
            ->editColumn('title_japan', function (Group $node) {
                return $node->title_japan;
            })
            ->editColumn('status', function (Group $node) {
                return CommonHelper::getMarkupStatus($node, 'key-words');
            })
            ->editColumn('sort', function (Group $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/key-words-group/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (Group $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Group $node) {
                return self::getMarkupAction($node, 'key-words-group');
            })
            ->rawColumns(['title_japan', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title_japan', 'status', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getAjaxCalculate($query)
    {
        $queryAdmin = Group::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($queryAdmin) {
                $queryAdmin->where('type', 'calculate')->orderBy('sort', 'desc');
                if ($search = request()->input('search.value')) {
                    $field = 'title_japan';
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
                        $queryAdmin->where($field, $operator, $search);
                    }
                }
            })
            ->editColumn('title_japan', function (Group $node) {
                return $node->title_japan;
            })
            ->editColumn('status', function (Group $node) {
                return CommonHelper::getMarkupStatus($node, 'calculate');
            })
            ->editColumn('sort', function (Group $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/calculate-group/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (Group $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Group $node) {
                return self::getMarkupAction($node, 'calculate-group');
            })
            ->rawColumns(['title_japan', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title_japan', 'status', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getAjaxCalculateService($query)
    {
        $queryAdmin = Group::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($queryAdmin) {
                $queryAdmin->where('type', 'calculate-service')->orderBy('sort', 'desc');
                if ($search = request()->input('search.value')) {
                    $field = 'title_japan';
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
                        $queryAdmin->where($field, $operator, $search);
                    }
                }
            })
            ->editColumn('title_japan', function (Group $node) {
                return $node->title_japan;
            })
            ->editColumn('status', function (Group $node) {
                return CommonHelper::getMarkupStatus($node, 'calculate');
            })
            ->editColumn('sort', function (Group $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'), this.getAttribute(\'data-type\'))" data-router="/calculate-service-group/changeSort" data-type="service" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (Group $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Group $node) {
                return self::getMarkupAction($node, 'calculate-service-group');
            })
            ->rawColumns(['title_japan', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title_japan', 'status', 'sort', 'created_at', 'action'])
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
                if (!empty($request->get('type')) && $request->get('type') == 'service') {
                    $this->updateServiceCategory($id, $request);
                } else {
                    $this->updateCalculateGroup($id, $request);
                }

                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }

    public function updateCalculateGroup($group_id, $request)
    {
        $data = $this->calculateGroup::query();
        $group = [];
        if ($group_id) {
            $data = $data->where('group_id', $group_id)->get();
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            foreach ($data as $key => $item) {
                $group[] = [
                    'calculate_id' => $item['calculate_id'],
                    'group_id' => $item['group_id'],
                    'sort' => $request->get('sort'),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->deleteCalculateGroup($group_id);
            $this->calculateGroup->insert($group);
        }
    }

    public function updateServiceCategory($group_id, $request)
    {
        $data = $this->serviceGroupCategory::query();
        $groupService = [];
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if ($group_id) {
            $data = $data->where('group_id', $group_id)->get();
                foreach ($data as $key => $item) {
                    $groupService[] = [
                        'category_id' => $item['category_id'],
                        'group_id' => $item['group_id'],
                        'sort' => $request->get('sort'),
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
            }
            $this->deleteServiceCategory($group_id);
            $this->serviceGroupCategory->insert($groupService);
        }
    }
}
