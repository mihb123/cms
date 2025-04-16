<?php

namespace App\Repositories;

use App\Models\ServiceCategoryPercentage;
use App\Models\ServiceGroupPercentage;

class ServiceCategoryPercentageRepository
{
    protected $model;

    public function __construct(ServiceCategoryPercentage $model)
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

        if (isset($option['category_manage_id']) && isset($option['type']) && isset($option['serviceCalculateIds'])) {
            return $data->whereIn('service_calculate_id', $option['serviceCalculateIds'])
                ->where('category_id', $option['category_manage_id'])
                ->where('type', $option['type'])
                ->orderBy('sort', 'desc')
                ->get();
        }

        if (isset($option['service_calculate_id'])) {
            return $data->where(
                'service_calculate_id',
                $option['service_calculate_id']
            )->orderBy('sort', 'desc')->pluck('category_id')->toArray();
        }
        if (isset($option['serviceCalculateIds'])) {
            return $data->whereIn(
                'service_calculate_id',
                $option['serviceCalculateIds']
            )
            ->orderBy('sort', 'desc')
            ->pluck('category_id')->toArray();
        }

        if (isset($option['category_id'])) {
            return $data->where('category_id', $option['category_id'])->orderBy('sort', 'desc')->pluck('service_calculate_id')->toArray();
        }

        if (isset($option['category_manage_id']) && isset($option['type'])) {
            $data = $data->where('category_id', $option['category_manage_id'])->orderBy('sort', 'desc')->where('type', $option['type']);
        }

        return $data = $data->orderBy('sort', 'desc')->get();
    }

    public function updateMoney($option, $request)
    {
        if (isset($option['category_id']) && isset($option['service_calculate_id'])) {
            $result = $this->model::query()->where('category_id', $option['category_id'])
                ->where('service_calculate_id', $option['service_calculate_id'])
                ->first();

            $data = [];
            if (!empty($result)) {
                $result->money = $request['money'];
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

    public function updateSort($option)
    {

        if (isset($option['service_calculate_id']) && isset($option['sort'])) {
            $result = $this->model::query()
                ->where('service_calculate_id', $option['service_calculate_id'])
                ->get();

            $data = [];
            if (!empty($result)) {
                foreach ($result as $key => $item) {
                    $data[] = [
                        'category_id' => $item['category_id'],
                        'service_calculate_id' => $item['service_calculate_id'],
                        'money' => $item['money'],
                        'type' => $item['type'],
                        'fixed_price' => $item['fixed_price'],
                        'sort' => $option['sort'],
                        'created_at' => $item['created_at'],
                        'updated_at' => $item['updated_at'],
                    ];
                }
                $this->model::query()->where('service_calculate_id', $option['service_calculate_id'])->delete();
           
                $this->insert($data);
            }

            return response()->json($data);
        }
    }

    public function changeFixedPrice($option, $request)
    {
        if (isset($option['category_id']) && isset($option['service_calculate_id'])) {
            $result = $this->model::query()->where('category_id', $option['category_id'])
                ->where('service_calculate_id', $option['service_calculate_id'])
                ->first();

            $data = [];
            if (!empty($result)) {
                $result->fixed_price = $request['fixed_price'];
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
