<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Group;
use App\Models\GroupCategory;
use App\Services\GroupCategoryService;
use Datatables;
use App\Helpers\CommonHelper;
use App\Models\PostCategory;
use Illuminate\Support\Str;

class CategoryRepository
{
    protected $model;
    protected $groupCategoryService;
    protected $groupCategory;
    protected $postsRepository;
    protected $postsCategoryRepository;
    protected $postGroupRepository;
    protected $group;
    const PUBLIC = 1;

    public function __construct(
        Category $model,
        GroupCategoryService $groupCategoryService,
        GroupCategory $groupCategory,
        PostsRepository $postsRepository,
        PostsCategoryRepository $postsCategoryRepository,
        Group $group,
        PostGroupRepository $postGroupRepository
    ) {
        $this->model = $model;
        $this->groupCategoryService = $groupCategoryService;
        $this->groupCategory = $groupCategory;
        $this->postsRepository = $postsRepository;
        $this->postsCategoryRepository = $postsCategoryRepository;
        $this->postGroupRepository = $postGroupRepository;
        $this->group = $group;
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
            $data = $data->whereIn('id', $option['ids']);
        }

        if (!empty($option['type'])) {
            $data = $data->where('type', $option['type']);
        }

        if (isset($option['display'])) {
            $data = $data->where('display', intval($option['display']));
        }
        $data = $data->where('status', self::PUBLIC);
        return $data = $data
            ->orderBy('sort', 'desc')
            ->get();
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['title'])) {
            $data = $data->where('title', $option['title']);
        }
        return $data = $data->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
    {
        $category = $this->model->create($data);
        $this->createGroupCategory($request, $category);
        return $category;
    }

    public function createGroupCategory($request, $category)
    {
        if (isset($request['group_id']) && $request['group_id']) {
            $listGroup = $this->group::query()->whereIn('id', $request['group_id'])->get();
            foreach ($listGroup as $key => $item) {
                $sortGroup[$item->id] = $item->sort;
            }
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            foreach ($request['group_id'] as $key => $value) {
                $group[] = [
                    'category_id' => $category['id'],
                    'group_id' => $value,
                    'type' => $request['module'],
                    'sort' => isset($sortGroup[$value]) ? $sortGroup[$value] : '',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->groupCategoryService->insert($group);
        }
    }

    public function update($data, $id, $request)
    {
        $category =  $this->model->updateOrCreate(['id' => $id], $data);
        if (isset($request['group_id']) && $request['group_id']) {
            $this->updateManagerPost($id, $data['type'], $request);
            $this->deleteGroupCategory($id, $data['type']);
            $this->createGroupCategory($request, $category);
        }

        return $category;
    }

    public function updateManagerPost($id, $type, $request)
    {
        $data = $this->groupCategory::query();
        if ($id) {
            $data = $data->where('category_id', $id);
        }
        // $groupIds= $data->where('type', $type)->pluck('group_id')->toArray();

        // $listPostOld = $this->postsRepository->getAll(['group_ids' => $groupIds]);

        foreach ($request['group_id'] as $key => $value) {
            $groupNew[] = $value;
        }

        $listPostNew = $this->postGroupRepository->getAll(['group_ids' => $groupNew]);

        $postCategory = $this->postsCategoryRepository->getAll(['post_ids' => $listPostNew, 'category_id' => $id]);
        if (!empty($postCategory)) {
            $this->postsCategoryRepository->getAll(['post_ids' => $listPostNew, 'category_id' => $id , 'postCategory_ids' => $postCategory]);
        }
    }

    public function deleteGroupCategory($id, $type)
    {
        $data = $this->groupCategory::query();
        if ($id) {
            $data = $data->where('category_id', $id);
        }
        $data = $data->where('type', $type);

        return $data->delete();
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        if ($id) {
            $this->deleteGroupCategory($id, $result->type);
        }

        return $result->delete();
    }

    public function getAjaxPost($query, $type, $module)
    {
        $queryAdmin = Category::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($query) use ($type) {
                $query->where('type', $type)->orderBy('sort', 'desc');
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
            ->editColumn('title', function (Category $node) {
                return  $node->title;
            })

            ->editColumn('group', function (Category $node) {
                $html = '';
                if (!empty($node->groupPosts)) {
                    foreach ($node->groupPosts as $key => $groupPosts) {
                        if (!empty($groupPosts->group)) {
                            $html .= '<span class="btn btn-default mt-2">' . $groupPosts->group->title_japan . '</span></br>';
                        }
                    }
                }
                return  $html;
            })

            ->editColumn('sort', function (Category $node) use ($module) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/' . $module . '/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('status', function (Category $node) {
                return CommonHelper::getMarkupStatus($node, 'posts');
            })

            ->editColumn('created_at', function (Category $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Category $node) use ($module) {
                return self::getMarkupAction($node, $module);
            })
            ->rawColumns(['title', 'sort', 'group', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'sort', 'group', 'status', 'created_at', 'action'])
            ->toJson();
    }

    public function getAjaxTag($query, $type)
    {
        $queryAdmin = Category::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($query) use ($type) {
                $query->where('type', 'tag')->orderBy('sort', 'desc');
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
            ->editColumn('title', function (Category $node) {
                return  $node->title;
            })
            ->editColumn('sort', function (Category $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/tag-group-category/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('status', function (Category $node) {
                return CommonHelper::getMarkupStatus($node, 'tag');
            })

            ->editColumn('created_at', function (Category $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Category $node) {
                return self::getMarkupAction($node, 'tag-group-category');
            })
            ->rawColumns(['title', 'sort', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'sort', 'status', 'created_at', 'action'])
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

    public function getAjaxProduct($query, $type, $module)
    {
        $queryAdmin = Category::query();
        return Datatables::eloquent($queryAdmin)
            ->filter(function ($query) use ($type) {
                $query->where('type', $type)->orderBy('sort', 'desc');
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
            ->editColumn('title', function (Category $node) {
                return  $node->title;
            })
            ->editColumn('sort', function (Category $node) use ($module) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/' . $module . '/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->addColumn('display', function (Category $node) use ($module) {
                $checked = isset($node->display) && $node->display == 1 ? 'checked' : '';
                return '<input type="checkbox" ' . $checked . '  onclick="displayTop(\'' . $node->id . '\', this.getAttribute(\'data-router\'), this)" data-router="/' . $module . '/display" class="form-control" style="height:unset" />';
            })

            ->editColumn('status', function (Category $node) {
                return CommonHelper::getMarkupStatus($node, 'posts');
            })

            ->editColumn('created_at', function (Category $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Category $node) use ($module) {
                return self::getMarkupAction($node, $module);
            })
            ->rawColumns(['title', 'sort', 'display', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'sort', 'display', 'status', 'created_at', 'action'])
            ->toJson();
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
}
