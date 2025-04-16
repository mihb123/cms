<?php
namespace App\Repositories;
use App\Helpers\CommonHelper;
use App\Models\Notice;
use App\Models\Tag;
use Datatables;
use Illuminate\Support\Str;

class NoticeRepository
{
    protected $model;
    const PUBLIC = 1;

    public function __construct (Notice $model)
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

        if(isset($option['year'])) {
            $data = $data->where('year', $option['year']);
        } else {
            $data = $data->where('year', intval(date('Y')));
        }
        
        if(isset($option['limit'])) {
            //「お知らせ」の投稿を「更新日時」の降順で表示変更 (@ edited by a.u  2024.11.01) 
            //return $data->limit($option['limit'])->where('status', self::PUBLIC)->orderBy('created_at', 'asc')->orderBy('sort','asc')->get();
            return $data->limit($option['limit'])->where('status', self::PUBLIC)->orderBy('sort','desc')->get();
        }
        
        $data = $data->where('status', self::PUBLIC);

        return $data = $data
            //「お知らせ」の投稿を「更新日時」の降順で表示変更 (@ edited by a.u  2024.11.01) 
            //->orderBy('sort','asc')
           ->orderBy('sort','desc')
            ->paginate(10);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data) {

        return  $this->model->create($data);
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
            ->editColumn('title', function(Notice $node) {
                return $node->title ;
            })
            ->editColumn('status', function(Notice $node) {
                return CommonHelper::getMarkupStatus($node, 'notice');
            })
            ->editColumn('sort', function(Notice $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/notice/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function(Notice $node) {
                return $node->created_at;
            })
            ->addColumn('action', function(Notice $node) {
                return self::getMarkupAction($node, 'notice');
            })
            ->rawColumns(['title', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title', 'status', 'sort', 'created_at', 'action'])
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
