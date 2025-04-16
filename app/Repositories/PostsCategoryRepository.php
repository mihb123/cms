<?php

namespace App\Repositories;

use App\Models\PostCategory;

class PostsCategoryRepository
{
    protected $model;

    public function __construct(PostCategory $model)
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
        if (isset($option['post_ids']) && isset($option['category_id'])) { 
            if (isset($option['postCategory_ids'])) {
                return $data->whereNotIn('id', $option['postCategory_ids'])->where('category_id', $option['category_id'])->delete();
            }    
            return $data->whereIn('post_id', $option['post_ids'])->where('category_id', $option['category_id'])->pluck('id')->toArray();
        }

        if (isset($option['category_id'])) {
            $data = $data->where('category_id', $option['category_id']);
        }

        if (isset($option['category_id']) && isset($option['post_id'])) {
            return $data->where('category_id', $option['category_id'])->where('post_id', $option['post_id'])->first();
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

    public function changeSortPost($request)
    {
        $option = [
            'category_id' => $request['category'],
            'post_id' => $request['id']
        ];
        $postCategory = $this->getAll($option);
        $result = $this->find($postCategory['id']);

        $data = [];
        if (!empty($result)) {
            $result->sort = $request['sort'];
            if ($result->save()) {
                $data = [
                    'error' => 200,
                    'message' => '新規作成が成功しました。'
                ];
            }
        }

        return response()->json($data);
    }

    public function deleteByChecked($request)
    {
        $option = [
            'category_id' => $request['category'],
            'post_id' => $request['id']
        ];
        $postCategory = $this->getAll($option);
        $result = $this->delete($postCategory['id']);
    }
}
