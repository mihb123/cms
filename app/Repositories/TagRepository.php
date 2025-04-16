<?php
namespace App\Repositories;
use App\Helpers\CommonHelper;
use App\Models\Tag;
use App\Services\TagGroupService;
use Datatables;
use Illuminate\Support\Str;

class TagRepository
{
    protected $model;
    protected $tagGroupService;
    const PUBLIC = 1;

    public function __construct (Tag $model, TagGroupService $tagGroupService)
    {
        $this->model = $model;
        $this->tagGroupService = $tagGroupService;
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
        return $data = $data->first();
    }

    public function getAll($option = []) {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        if (isset($option['keyWord'])) {
            $data = $data->where('title','like', '%'.$option['keyWord'].'%');
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

    public function create($data, $request) {

        $tag = $this->model->create($data);

        if(isset($request['group_id']) && $request['group_id']) {
            $data = [
                'tag_id' => $tag['id'],
                'group_id' => $request['group_id'],
                'sort' => $tag['sort'],
            ];
            $this->tagGroupService->create($data);
        }

        return $tag;
    }

    public function update($data, $id, $request)
    {
        $result = $this->model->where('id', $id)->update($data);
        if(isset($request['group_id']) && $request['group_id']) {
            $option['tag_id'] = $id;
            $group = $this->tagGroupService->getDetail($option);
            if ($group) {
                $this->tagGroupService->destroy($group['id']);
            }
            $tag = $this->find($id);
            $data = [
                'tag_id' => $id,
                'group_id' => $request['group_id'],
                'sort' => $tag['sort'],
            ];

            $this->tagGroupService->create($data);
        }

        return $result;
    }

    public function tagGroup($id, $tag)
    {
        $option['tag_id'] = $id;
        $group = $this->tagGroupService->getDetail($option);
        if ($group) {
            $data = [
                'tag_id' => $id,
                'group_id' => $group['group_id'],
                'sort' => $tag['sort'],
            ];
            $this->tagGroupService->destroy($group['id']);
            $this->tagGroupService->create($data);
        }
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

                if (request()->input('order.0.dir') == "asc" && request()->input('order.0.column') == 0) {
                    $query->orderBy('sort', 'desc');
                } elseif (request()->input('order.0.dir') == "asc") {
                    $query->orderBy('sort', 'asc');
                } else {
                    $query->orderBy('sort', 'desc');
                }

            })
            ->editColumn('title', function(Tag $node) {
                return $node->title ;
            })
            ->editColumn('status', function(Tag $node) {
                return CommonHelper::getMarkupStatus($node, 'tag');
            })
            ->editColumn('sort', function(Tag $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/tag/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function(Tag $node) {
                return $node->created_at;
            })
            ->addColumn('action', function(Tag $node) {
                return self::getMarkupAction($node, 'tag');
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

    public function changeSort($request) {
        $id = $request->get('id');
        if(validateSort($request)) {
        return response()->json(validateSort($request));
        }
        $result = $this->find($id);

        if (!empty($result)) {
            $result->sort = $request->get('sort');
            if ($result->save()) {
                $this->tagGroup($id, $this->find($id));
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }
}
