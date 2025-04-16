<?php

namespace App\Repositories;

use App\Helpers\CommonHelper;
use Datatables;
use App\Models\PercentageBurden;
use App\Models\PercentageBurdenCategory;
use Illuminate\Support\Str;

class PercentageBurdenCategoryRepository
{
    protected $model;

    public function __construct(PercentageBurdenCategory $model)
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

        if (isset($option['category_id'])) {
            $data = $data->where('category_id', $option['category_id']);
        }

        if (isset($option['calculate_id'])) {
            $data = $data->where('calculate_id', $option['calculate_id']);
        }

        return $data = $data->get();
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
