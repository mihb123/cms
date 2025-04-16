<?php
namespace App\Repositories;
use App\Helpers\CommonHelper;
use App\Models\Service;
use App\Models\Tag;
use Datatables;
use Illuminate\Support\Str;

class ServiceRepository
{
    protected $model;
    const PUBLIC = 1;

    public function __construct (Service $model)
    {
        $this->model = $model;
    }

    public function getAll($option = []) {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        if (isset($option['display'])) {
            $data = $data->where('display', $option['display']);
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

        $request = $request->except(['_token', '_method']);
        return  $this->model->create($request);
    }

    public function update($request, $id)
    {
        $request = $request->except(['_token', '_method']);
        return $this->model->where('id', $id)->update($request);
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
            ->editColumn('title', function(Service $node) {
                return $node->title ;
            })
            ->editColumn('status', function(Service $node) {
                return CommonHelper::getMarkupStatus($node, 'product');
            })
            ->addColumn('display', function (Service $node) {
                $checked = isset($node->display) && $node->display == 1 ? 'checked' : '';
                return '<input type="checkbox" ' . $checked . '  onclick="displayTop(\'' . $node->id . '\', this.getAttribute(\'data-router\'), this)" data-router="/company-service/display" class="form-control" style="height:unset" />';
            })
            ->editColumn('created_at', function(Service $node) {
                return $node->created_at;
            })
            ->addColumn('action', function(Service $node) {
                return self::getMarkupAction($node, 'company-service');
            })
            ->rawColumns(['title', 'status', 'display', 'created_at', 'action'])
            ->only(['id', 'title', 'status', 'display', 'created_at', 'action'])
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
