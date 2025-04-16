<?php

namespace App\Services;

use App\Repositories\CompanyCategoryRepository;

use Modules\Cms\Media\Models\Media;

class CompanyCategoryService
{
    protected $companyCategoryRepository;

    public function __construct(CompanyCategoryRepository $companyCategoryRepository)
    {
        $this->companyCategoryRepository = $companyCategoryRepository;
    }

    public function getAll($option = [])
    {
        return $this->companyCategoryRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->companyCategoryRepository->find($id);
    }

    public function create($data)
    {
        return $this->companyCategoryRepository->create($data);
    }

    public function update($data, $id)
    {
        return $this->companyCategoryRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->companyCategoryRepository->destroy($id);
    }

    public function insert($request)
    {
        return $this->companyCategoryRepository->insert($request);
    }
}
