<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\GroupCategory;
use Datatables;
use App\Helpers\CommonHelper;
use Illuminate\Support\Str;

class GroupCategoryRepository
{
    protected $model;
    const PUBLIC = 1;
    public function __construct (GroupCategory $model)
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

    public function updateMoney($option, $request)
    {
        if (isset($option['category_id']) && isset($option['group_id'])) {
            $result = $this->model::query()->where('category_id', $option['category_id'])
                ->where('group_id', $option['group_id'])
                ->first();
            $data = [];
            if (!empty($result)) {
                $result->max_money = $request['money'];
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

    public function deleteCategory($id)
    {
        $data = $this->model::query();
        if ($id) {
            $data = $data->where('category_id', $id);
        } 

        return $data->delete();
    }
}
