<?php

namespace App\Repositories;

use App\Models\CalculateGroup;

class CalculateGroupRepository
{
    protected $model;

    public function __construct(CalculateGroup $model)
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

        if (isset($option['calculate_id'])) {
            $data = $data->where('calculate_id', $option['calculate_id']);
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
