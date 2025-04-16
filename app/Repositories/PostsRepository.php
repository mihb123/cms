<?php

namespace App\Repositories;

use App\Models\Post;
use Datatables;
use App\Helpers\CommonHelper;
use App\Models\PostGroup;
use Illuminate\Support\Str;

class PostsRepository
{
    protected $model;
    protected $postGroupRepository;
    const PUBLIC = 1;

    public function __construct(Post $model, PostGroupRepository $postGroupRepository)
    {
        $this->model = $model;
        $this->postGroupRepository = $postGroupRepository;
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

        if (isset($option['limit']) && isset($option['ids'])) {
            shuffle($option['ids']);
            $randomIds = array_slice($option['ids'], 0, 5);
            return $data->whereIn('id', $randomIds)->orderBy('sort', 'desc')->where('status', self::PUBLIC)->get();
        }

        if (isset($option['ids'])) {
            $data = $data->whereIn('id', $option['ids']);
        }

        if (isset($option['updated_at']) && isset($option['idPosts'])) {
            return $data->whereIn('id', $option['idPosts'])->where('status', self::PUBLIC)->orderBy('updated_at', $option['updated_at'])->first();
        }

        if (isset($option['ids_new'])) {
            return $data->whereIn('id', $option['ids_new'])->where('status', self::PUBLIC)->orderBy('sort', 'desc')->paginate(10);
        }


        if (isset($option['group_ids'])) {
            return $data->whereIn('group_id', $option['group_ids'])->where('status', self::PUBLIC)->pluck('id')->toArray();
        }

        $data = $data->where('status', self::PUBLIC);

        return $data = $data
            ->orderBy('sort', 'desc')
            ->paginate(10);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
    {
        $post = $this->model->create($data);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if (isset($request['group_id']) && $request['group_id']) {
            foreach ($request['group_id'] as $key => $group) {
                $dataGroup[] = [
                    'post_id' => $post['id'],
                    'group_id' => $group,
                    'sort' => $post['sort'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->postGroupRepository->insert($dataGroup);
        }
        return $post;
    }

    public function update($data, $id, $request)
    {
        $result = $this->model->where('id', $id)->update($data);
        if (isset($request['group_id']) && $request['group_id']) {
            $option['post_id'] = $id;
            $query = PostGroup::query()->where(['post_id' => $id])->delete();

            $post = $this->find($id);
            $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
            foreach ($request['group_id'] as $key => $group) {
                $dataGroup[] = [
                    'post_id' => $post['id'],
                    'group_id' => $group,
                    'sort' => $post['sort'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            $this->postGroupRepository->insert($dataGroup);
        }
        return $result;
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
            ->editColumn('title', function (Post $node) {
                return $node->title;
            })

            ->editColumn('group', function (Post $node) {

                $html = '';
                if (!empty($node->group)) {
                    foreach ($node->group as $key => $group) {
                        $html .= '<span class="btn btn-default mt-2">' . $group->title_japan . '</span></br>';
                    }
                }
                return  $html;
            })
            ->editColumn('status', function (Post $node) {
                return CommonHelper::getMarkupStatus($node, 'posts');
            })
            ->editColumn('created_at', function (Post $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (Post $node) {
                return self::getMarkupAction($node, 'posts');
            })
            ->rawColumns(['title', 'group', 'status', 'created_at', 'action'])
            ->only(['id', 'title', 'group', 'status', 'created_at', 'action'])
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

    public function displayTop($request)
    {
        $id = $request->get('id');
        if (validateSort($request)) {
            return response()->json(validateSort($request));
        }
        $result = $this->find($id);

        if (!empty($result)) {
            $result->type = intval($request->get('type'));
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
