<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Models\Group;
use App\Models\TagCategory;
use App\Models\TagGroup;
use App\Models\TagNews;
use Datatables;
use App\Helpers\CommonHelper;
use Illuminate\Support\Str;

class TagNewsRepository
{
    protected $model;
    const PUBLIC = 1;
    public function __construct (TagNews $model)
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

        $data = $data->where('status', self::PUBLIC);

        return $data = $data
            ->orderBy('sort','desc')
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
        $tag = $this->model->where('id', $id)->update($data);
        return $tag;
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
            ->editColumn('tag_id', function(TagNews $node) {
                return $node->tag ? $node->tag->title : '' ;
            })
            ->editColumn('status', function(TagNews $node) {
                return CommonHelper::getMarkupStatus($node, 'tag');
            })
            ->editColumn('sort', function(TagNews $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/tag-news/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function(TagNews $node) {
                return $node->created_at;
            })
            ->addColumn('action', function(TagNews $node) {
                return self::getMarkupAction($node, 'tag-news');
            })
            ->rawColumns(['tag_id', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'tag_id', 'status', 'sort', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module) {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit',  $data->id) . '" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <a href="' . route('tag.detail',  $data->tag_id) . '" class="btn btn-success btn-sm mr-2" target="_blank">
                          <i class="fa fa-eye text-light"></i>
                        </a>
                        <form action="' . route($module . '.destroy', $data->id) .'" id="form-delete-'.$data->id.'">';
        $htmlFrom .=          csrf_field();
        $htmlFrom .=          '<a href="javascript:;" data-id="'.$data->id.'" class="btn btn-google btn-sm delete-action">
                                <i class="fas fa-trash"></i>
                              </a>
                        </form>
                    </div>';

        return $htmlFrom;
    }

    public function changeSort($request) {
        $id = $request->get('id');
        if(validateSort($request)) {
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
