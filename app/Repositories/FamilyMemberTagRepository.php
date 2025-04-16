<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use App\Models\FamilyMemberTag;
use Datatables;
use Illuminate\Support\Str;

class FamilyMemberTagRepository
{
    protected $model;

    const PUBLIC = 1;

    public function __construct(FamilyMemberTag $model)
    {
        $this->model = $model;
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['title'])) {
            $data = $data->where('title', $option['title']);
        }
        if (isset($option['title-keyWord'])) {
            return $data->where('title', 'like', '%' . $option['title-keyWord'] . '%')->pluck('id')->toArray();
        }
        return $data = $data->first();
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

        $data = $data->where('status', self::PUBLIC);

        return $data = $data
            ->orderBy('sort', 'desc')
            ->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->where('id', $id)->update($data);
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
            ->editColumn('title', function (FamilyMemberTag $node) {
                return $node->title;
            })
            ->editColumn('status', function (FamilyMemberTag $node) {
                return CommonHelper::getMarkupStatus($node, 'family-member');
            })
            ->editColumn('sort', function (FamilyMemberTag $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/family-member-tag/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (FamilyMemberTag $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (FamilyMemberTag $node) {
                return self::getMarkupAction($node, 'family-member-tag');
            })
            ->rawColumns(['title', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title', 'status', 'sort', 'created_at', 'action'])
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
}
