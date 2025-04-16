<?php
namespace App\Repositories;

use Datatables;
use App\Helpers\CommonHelper;
use App\Models\PostUseful;
use Illuminate\Support\Str;

class PostUsefulRepository
{
    protected $model;
    protected $categoryRepository;
    const PUBLIC = 1;
    public function __construct (PostUseful $model, CategoryRepository $categoryRepository)
    {
        $this->model = $model;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll($option = []) {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        if(isset($option['limit']) && isset($option['random'])) {
            return $data->inRandomOrder()->limit($option['limit'])->orderBy('sort', 'desc')->where('status', self::PUBLIC)->get();
        }

        if (isset($option['id_related']) && isset($option['category_id'])) {
            $data = $data->where('id', '!=', $option['id_related'])->where('category_id', $option['category_id'])->limit(5);
        }
        
        if(isset($option['limit'])) {
            $data = $data->limit($option['limit']);
        }

        if (isset($option['category']) && $option['category']) {
            $category =  $this->categoryRepository->getDetail(['title' => $option['category']]);
            if ($category) {
                return $data = $data->where('category_id', $category->id)->orderBy('sort', 'desc')->paginate(10);
            }
        }

        $data = $data->where('status', self::PUBLIC);
        return $data = $data
            ->orderBy('sort','desc')->limit(10)->get();
//             ->paginate(10);
    }

    public function getAllUser($option = []) {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        if(isset($option['limit']) && isset($option['random'])) {
            return $data->inRandomOrder()->limit($option['limit'])->orderBy('sort', 'desc')->get();
        }

        if(isset($option['limit'])) {
            $data = $data->limit($option['limit']);
        }

        if (isset($option['category']) && $option['category']) {
            $category =  $this->categoryRepository->getDetail(['title' => $option['category']]);
            if ($category) {
                //カテゴリー選択後の一覧に非公開記事が表示される不具合の対応 (@ edited by a.u  2024.10.30) 
                //return $data = $data->where('category_id', $category->id)->orderBy('sort', 'desc')->paginate(10);
                return $data = $data->where('category_id', $category->id)->where('status', self::PUBLIC)->orderBy('sort', 'desc')->paginate(10);
            }
        }

        $data = $data->where('status', self::PUBLIC);
        return $data = $data
            ->orderBy('sort','desc')->limit(10)
            ->paginate(10);
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
            ->editColumn('title', function(PostUseful $node) {
                return $node->title ;
            })
            ->editColumn('creator_id', function(PostUseful $node) {
                return $node->creator_id ;
            })
            ->editColumn('status', function(PostUseful $node) {
                return CommonHelper::getMarkupStatus($node, 'posts');
            })
            ->editColumn('sort', function(PostUseful $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/posts-useful/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->editColumn('created_at', function(PostUseful $node) {
                return $node->created_at;
            })
            ->addColumn('action', function(PostUseful $node) {
                return self::getMarkupAction($node, 'topic-useful');
            })
            ->rawColumns(['title', 'creator_id', 'status', 'sort', 'created_at', 'action'])
            ->only(['id', 'title', 'creator_id', 'status', 'sort', 'created_at', 'action'])
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
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }
}
