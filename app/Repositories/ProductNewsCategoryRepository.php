<?php
namespace App\Repositories;
use App\Models\ProductNewsCategory;
use Datatables;

class ProductNewsCategoryRepository
{
    protected $model;
    const PUBLIC = 1;

    public function __construct (ProductNewsCategory $model)
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

        $data = $data->where('status', self::PUBLIC);

        return $data = $data->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($request)
    {
        return  $this->model->create($request);
    }

    public function update($request, $id)
    {
        return $this->model->where('id', $id)->update($request);
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
