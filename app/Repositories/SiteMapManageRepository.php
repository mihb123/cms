<?php

namespace App\Repositories;

use App\Models\SiteMap;
use App\Models\SiteMapManage;
use App\Services\SiteMapService;

class SiteMapManageRepository
{
    protected $model;
    protected $siteMapRepository;


    public function __construct (
        SiteMapManage $model,
        SiteMapRepository $siteMapRepository 
    ) {
        $this->model = $model;
        $this->siteMapRepository = $siteMapRepository;
    }

    public function getAll($option = [])
    {
        $result = $this->model::query()->first();
        
        return $result;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
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
    
    public function general()
    {
        $siteMap = [];
        $siteMapManages = $this->getAll();
        $siteMaps = $this->siteMapRepository->getAll();        
        foreach ($siteMaps as $key => $item) {
            $siteMap[$item['id']] = $item;
        }

        return compact('siteMapManages', 'siteMap');
    }

}
