<?php

namespace App\Repositories;

use Datatables;
use App\Helpers\CommonHelper;
use App\Models\FamilyMemberNews;
use App\Models\FamilyMemberTag;
use App\Models\FamilyMemberTagGroup;
use App\Services\FamilyMemberTagService;
use Illuminate\Support\Str;

class FamilyMemberNewsRepository
{
    protected $model;
    protected $familyMemberTagRepository;
    protected $familyMemberCategoryRepository;
    const TYPE_TOPIC = 1;
    const TYPE_NEWS = 2;
    const PUBLIC = 1;

    public function __construct (
        FamilyMemberNews $model,
        FamilyMemberTagRepository $familyMemberTagRepository,
        FamilyMemberCategoryRepository $familyMemberCategoryRepository
    ){
        $this->model = $model;
        $this->familyMemberTagRepository = $familyMemberTagRepository;
        $this->familyMemberCategoryRepository = $familyMemberCategoryRepository;
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        if (isset($option['type']) && $option['type'] == "topic") {
            $data = $data->where('type', self::TYPE_TOPIC);

        } elseif (isset($option['type']) && $option['type'] == "news") {
            return $data = $data->where('type', self::TYPE_NEWS)
                ->where('status', self::PUBLIC)
                ->orderBy('sort', 'desc')
                ->paginate(40);
        }

        if (isset($option['keyword']) && $option['keyword']) {
            // $tag = $this->familyMemberTagRepository->getDetail(['title' => $option['keyword']]);
            $tagIds = $this->familyMemberTagRepository->getDetail(['title-keyWord' => $option['keyword']]);

            if ($tagIds) {
                // return $data = $data->where('tag_id', $tag->id)->where('status', self::PUBLIC)->orderBy('sort', 'desc')->paginate(40);
                return $data = $data->whereIn('tag_id', $tagIds)->where('status', self::PUBLIC)->orderBy('sort', 'desc')->paginate(40);
            }
        }

        if (isset($option['category']) && $option['category']) {
            $category =  $this->familyMemberCategoryRepository->getDetail(['title' => $option['category']]);
            if ($category) {
                return $data = $data->where('family_member_category_id', $category->id)->where('status', self::PUBLIC)->orderBy('sort', 'desc')->paginate(40);
            }
        }
        $data = $data->where('status', self::PUBLIC);
        if(($option['ignore_pagi'] ?? 0) == 1){
            return $data = $data
                ->orderBy('sort', 'desc')
                ->limit(40)
                ->get();
        }
        return $data = $data
            ->orderBy('sort', 'desc')
            ->paginate(40);
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['name'])) {
            $data = $data->where('name', $option['name']);
        }
        return $data = $data->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return  $this->model->updateOrCreate(['id' => $id], $data);
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);

        return $result->delete();
    }

    public function getAjax($query)
    {
        $queryAdmin = FamilyMemberNews::query();
        return Datatables::eloquent($queryAdmin)
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
            ->editColumn('title', function (FamilyMemberNews $node) {
                return  $node->title;
            })

            ->editColumn('member', function (FamilyMemberNews $node) {
                return $node->familyMember ? $node->familyMember->name : '';
            })

            ->editColumn('type', function (FamilyMemberNews $node) {
                return getTypeFamily()[$node->type];
            })

            ->editColumn('sort', function(FamilyMemberNews $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/family-member-news/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })

            ->editColumn('status', function(FamilyMemberNews $node) {
                return CommonHelper::getMarkupStatus($node, 'family-member');
            })

            ->editColumn('created_at', function (FamilyMemberNews $node) {
                return $node->created_at;
            })

            ->addColumn('action', function (FamilyMemberNews $node) {
                return self::getMarkupAction($node, 'family-member-news');
            })

            ->rawColumns(['title', 'member', 'type', 'sort', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'member', 'type', 'sort', 'status', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module)
    {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit',  $data->id) . '" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <a href="' . route('mitori-taiken.detail',  $data->id) . '" class="btn btn-success btn-sm mr-2" target="_blank">
                          <i class="fa fa-eye text-light"></i>
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

}
