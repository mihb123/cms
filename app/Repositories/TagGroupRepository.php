<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Models\Group;
use App\Models\TagCategory;
use App\Models\TagGroup;
use Datatables;
use App\Helpers\CommonHelper;
use Illuminate\Support\Str;

class TagGroupRepository
{
    protected $model;

    public function __construct (TagGroup $model)
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
        if (isset($option['tag_id'])) {
            $data = $data->where('tag_id', $option['tag_id']);
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
        if (isset($option['tag_id'])) {
            $data = $data->where('tag_id', $option['tag_id']);
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

}
