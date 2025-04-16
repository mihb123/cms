<?php
namespace App\Repositories;
use App\Helpers\CommonHelper;
use App\Models\Product;
use App\Models\ProductGroupCategory;
use App\Models\Tag;
use Datatables;
use Illuminate\Support\Str;

class ProductGroupCategoryRepository
{
    protected $model;
    const PUBLIC = 1;

    public function __construct (ProductGroupCategory $model)
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
