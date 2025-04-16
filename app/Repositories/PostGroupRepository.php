<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Models\Group;
use App\Models\TagCategory;
use App\Models\TagGroup;
use Datatables;
use App\Helpers\CommonHelper;
use App\Models\PostGroup;
use Illuminate\Support\Str;

class PostGroupRepository
{
    protected $model;

    public function __construct (PostGroup $model)
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

        if (isset($option['post_id'])) {
            $data = $data->where('post_id', $option['post_id']);
        }

        if (isset($option['group_id'])) {
            $data = $data->where('group_id', $option['group_id']);
        }

        if (isset($option['group_ids'])) {
            return $data->whereIn('group_id', $option['group_ids'])->pluck('post_id')->toArray();
        }

        return $data = $data
            ->orderBy('sort','desc')
            ->get();
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();
        if (isset($option['title'])) {
            $data = $data->where('title', $option['title']);
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['post_id'])) {
            $data = $data->where('post_id', $option['post_id']);
        }
        return $data = $data->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        return $result->delete();
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }

}
