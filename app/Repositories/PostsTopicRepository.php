<?php

namespace App\Repositories;

use Datatables;
use App\Helpers\CommonHelper;
use App\Models\PostTopic;
use Illuminate\Support\Str;

class PostsTopicRepository
{
    protected $model;
    const PUBLIC = 1;
    public function __construct(PostTopic $model)
    {
        $this->model = $model;
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

        if (isset($option['limit'])) {
            $data = $data->limit($option['limit']);
        }

        if (isset($option['id_related']) && isset($option['category_id'])) {
            $data = $data->where('id', '!=', $option['id_related'])->where('category_id', $option['category_id'])->limit(5);
        }
        
        if (isset($option['position'])) {
            $data = $data->where('position', $option['position']);
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

    public function create($data)
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
                    $field = 'creator_id';
                    $operator = '=';

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
            ->editColumn('title', function (PostTopic $node) {
                return $node->title;
            })
            ->editColumn('position', function (PostTopic $node) {
                return self::getMarkupPosition($node, 'posts');
            })
            ->editColumn('status', function (PostTopic $node) {
                return CommonHelper::getMarkupStatus($node, 'posts');
            })
            ->editColumn('sort', function (PostTopic $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/posts-topic/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function (PostTopic $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (PostTopic $node) {
                return self::getMarkupAction($node, 'posts-topic');
            })
            ->rawColumns(['title', 'position', 'creator_id', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title', 'position', 'creator_id', 'status', 'sort', 'created_at', 'action'])
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

    public function getMarkupPosition($data, $module)
    {
        if ($data->position == config("constants.position_top")) {
            return '<span class="btn btn-outline-success">' . __('Top') . '</span>';
        } else if ($data->position == config("constants.position_product")) {
            return '<span class="btn btn-default">' . __('Product') . '</span>';
        }
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
}
