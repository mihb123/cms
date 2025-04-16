<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\GroupKeyWords;
use Datatables;
use App\Helpers\CommonHelper;
use Illuminate\Support\Str;

class GroupKeyWordsRepository
{
    protected $model;
    const PUBLIC = 1;
    public function __construct (GroupKeyWords $model)
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
        if (isset($option['group_ids'])) {
            return $data->where('group_id', $option['group_ids'])->orderby('sort', 'desc')->pluck('category_id')->toArray();
        }
        if (isset($option['category_id'])) {
            $data = $data->where('category_id', $option['category_id']);
        }

        return $data = $data->orderby('sort', 'desc')->get();
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();

        if (isset($option['group_id'])) {
            $data = $data->where('group_id', $option['group_id']);
        }
       
        if (isset($option['category_id'])) {
            $data = $data->where('category_id', $option['category_id']);
        }
        
        return $data = $data->first();
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

    public function deleteGroup($id)
    {
        $data = $this->model::query();
        if ($id) {
            $data = $data->where('group_id', $id);
        } 

        return $data->delete();
    }
}
