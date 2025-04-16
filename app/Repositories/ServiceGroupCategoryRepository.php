<?php

namespace App\Repositories;

use App\Models\CalculateGroup;
use App\Models\ServiceGroupCategory;

class ServiceGroupCategoryRepository
{
    protected $model;

    public function __construct(ServiceGroupCategory $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();

        if (isset($option['group_id'])) {
            $data = $data->where('group_id', $option['group_id']);
        }
        if (isset($option['id'])) {
            return $data->where('group_id', $option['id'])->pluck('category_id')->toArray();
        }

        if (isset($option['group_ids']) && isset($option['category_id'])) {
            return $data->whereIn('group_id', $option['group_ids'])->where('category_id', $option['category_id'])->orderBy('sort', 'desc')->get();
        }

        if (isset($option['category_id'])) {
            $data = $data->where('category_id', $option['category_id']);
        }

        return $data = $data->orderBy('sort', 'desc')->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if (empty($result)) {
            return false;
        }
        return $result->delete();
    }
}
