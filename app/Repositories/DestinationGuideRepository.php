<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use App\Models\Creator;
use App\Models\DestinationGuide;
use App\Models\Tag;
use Datatables;
use Illuminate\Support\Str;
use Modules\Cms\Media\Models\Media;

class DestinationGuideRepository
{
    protected $model;

    const PUBLIC = 1;

    public function __construct(DestinationGuide $model)
    {
        $this->model = $model;
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();
        if (isset($option['title'])) {
            $data = $data->where('title', intval($option['title']));
        }

        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }

        return $data = $data->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($request)
    {
        $request = $request->except(['_token', '_method', 'files', 'thumb-avatar']);
        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $request['avatar'] = $avatar->getEmbedded()->toarray();
        }
        return $this->model->create($request);
    }

    public function update($request, $id)
    {
        $request = $request->except(['_token', '_method', 'files', 'thumb-avatar']);
        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $request['avatar'] = $avatar->getEmbedded()->toarray();
        }

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
            ->editColumn('title', function (DestinationGuide $node) {
                return $node->title;
            })
            ->editColumn('url', function (DestinationGuide $node) {
                return $node->url;
            })

            ->editColumn('created_at', function (DestinationGuide $node) {
                return $node->created_at;
            })
            ->addColumn('action', function (DestinationGuide $node) {
                return self::getMarkupAction($node, 'destination-guide');
            })
            ->rawColumns(['title', 'url', 'created_at', 'action'])
            ->only(['id', 'title', 'url', 'created_at', 'action'])
            ->toJson();
    }

    public function getMarkupAction($data, $module)
    {
        $htmlFrom = '<div class="d-flex justify-content-center">
                        <a href="' . route($module . '.edit', $data->id) . '" class="btn btn-warning btn-sm mr-2">
                        <i class="fas fa-pencil-alt text-light"></i>
                        </a>
                        <form action="' . route(
            $module . '.destroy',
            $data->id
        ) . '" id="form-delete-' . $data->id . '">';
        $htmlFrom .= csrf_field();
        $htmlFrom .= '<a href="javascript:;" data-id="' . $data->id . '" class="btn btn-google btn-sm delete-action">
                                <i class="fas fa-trash"></i>
                            </a>
                        </form>
                    </div>';

        return $htmlFrom;
    }
}
