<?php

namespace App\Repositories;

use Datatables;
use App\Helpers\CommonHelper;
use App\Models\Banners;
use Illuminate\Support\Str;
use Modules\Cms\Media\Models\Media;

class BannersRepository
{
    protected $model;
    const PUBLIC = 1;

    public function __construct(Banners $model)
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

        if (isset($option['position'])) {
            return $data->where('position', $option['position'])->where('status', self::PUBLIC)->get();
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

    public function create($request)
    {
        $request = $request->except(['_token', '_method', 'thumb-avatar']);
        $now = date(config('constants.DEFAULT_DATE_FULL_DB'));
        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $request['avatar'] = $avatar->getEmbedded()->toarray();
        }
        $request['sort'] = $now;

        $result = $this->model->create($request);

        return $result;
    }

    public function update($request, $id)
    {
        $request = $request->except(['_token', '_method', 'thumb-avatar']);

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $request['avatar'] = $avatar->getEmbedded()->toarray();
        }

        $result = $this->model->where('id', $id)->update($request);

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
            ->editColumn('url', function (Banners $node) {
                return $node->url;
            })
            ->editColumn('position', function (Banners $node) {
                return self::getMarkupPosition($node, 'banners');
            })

            ->editColumn('status', function (Banners $node) {
                return CommonHelper::getMarkupStatus($node, 'banners');
            })
            ->editColumn('created_at', function (Banners $node) {
                return $node->created_at;
            })
            ->editColumn('sort', function (Banners $node) {
                return '<input type="text" onchange="changeSort(\'' . $node->id . '\', this.value, this.getAttribute(\'data-router\'))" data-router="/banners/changeSort" class="form-control valid" value="' . $node->sort . '" />';
            })
            ->addColumn('action', function (Banners $node) {
                return self::getMarkupAction($node, 'banners');
            })
            ->rawColumns(['url', 'position', 'status', 'created_at', 'sort', 'action'])
            ->only(['id', 'url', 'position', 'status', 'created_at', 'sort', 'action'])
            ->toJson();
    }

    public function getMarkupPosition($data, $module)
    {
        if ($data->position == config("constants.position_top")) {
            return '<span class="btn btn-default">' . __('トップ') . '</span>';
        } else if ($data->position == config("constants.position_product")) {
            return '<span class="btn btn-default">' . __('製品一覧') . '</span>';
        } else {
            return '<span class="btn btn-default">' . __('製品詳細') . '</span>';
        }
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
