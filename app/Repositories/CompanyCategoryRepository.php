<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\CompanyCategory;
use App\Models\Group;
use App\Models\GroupCategory;
use App\Services\GroupCategoryService;
use Datatables;
use App\Helpers\CommonHelper;
use Illuminate\Support\Str;

class CompanyCategoryRepository
{
    protected $model;
    protected $groupCategoryService;
    protected $groupCategory;
    protected $group;
    const PUBLIC = 1;

    public function __construct(CompanyCategory $model)
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
        if (isset($option['ids'])) {
            $data = $data->whereIn('id', $option['ids']);
        }


        $data = $data->where('status', self::PUBLIC);
        return $data = $data
            ->orderBy('sort', 'desc')
            ->get();
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();
        if (isset($option['status'])) {
            $data = $data->where('status', intval($option['status']));
        }
        if (isset($option['id'])) {
            $data = $data->where('id', $option['id']);
        }
        if (isset($option['title'])) {
            $data = $data->where('title', $option['title']);
        }
        return $data = $data->first();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);

    }

    public function update($data, $id)
    {
        return $this->model->updateOrCreate(['id' => $id], $data);
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
