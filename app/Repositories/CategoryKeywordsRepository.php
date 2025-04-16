<?php

namespace App\Repositories;

use Datatables;
use App\Helpers\CommonHelper;
use App\Models\CategoryKeywords;

class CategoryKeywordsRepository
{
    protected $model;

    public function __construct(
        CategoryKeywords $model
    ) {
        $this->model = $model;
    }

    public function getAll($option = [])
    {
        $data = $this->model::query();
        if (isset($option['category_id'])) {
            $data = $data->where('category_id', $option['category_id']);
        }

        if (isset($option['category_ids'])) {
            return $data->where('category_id', $option['category_ids'])->pluck('key_words_id')->toArray();
        }

        if (isset($option['key_words_id'])) {
            $data = $data->where('key_words_id', $option['key_words_id']);
        }
        return $data = $data->get();
    }

    public function getDetail($option = [])
    {
        $data = $this->model::query();

        if (isset($option['category_id'])) {
            $data = $data->where('category_id', $option['category_id']);
        }

        if (isset($option['key_words_id'])) {
            $data = $data->where('key_words_id', $option['key_words_id']);
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

    public function insert($data)
    {
        return $this->model->insert($data);
    }

    public function update($data, $id, $request)
    {
        return $this->model->updateOrCreate(['id' => $id], $data);
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);

        return $result->delete();
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
