<?php
namespace App\Repositories;

use App\Models\PostType;
use Datatables;
use App\Helpers\CommonHelper;
use App\Models\PostTopic;
use Illuminate\Support\Str;

class PostsTypeRepository
{
    protected $model;
    const PUBLIC = 1;
    public function __construct (PostType $model)
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

        if(isset($option['limit'])) {
            $data = $data->limit($option['limit'])->orderBy('created_at', 'asc');
        }

        $data = $data->where('status', self::PUBLIC);
        return $data = $data->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data) {

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
            ->editColumn('title', function(PostType $node) {
                return $node->title ;
            })
            ->editColumn('status', function(PostType $node) {
                return CommonHelper::getMarkupStatus($node, 'posts');
            })
            ->editColumn('created_at', function(PostType $node) {
                return $node->created_at;
            })
            ->addColumn('action', function(PostType $node) {
                return self::getMarkupAction($node, 'posts-type');
            })
            ->rawColumns(['title', 'creator_id', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'creator_id', 'status', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module) {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit',  $data->id) . '" class="btn btn-warning btn-sm mr-2">
                          <i class="fas fa-pencil-alt text-light"></i>
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
}
