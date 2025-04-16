<?php
namespace App\Services;

use App\Repositories\GroupCategoryRepository;
use Modules\Cms\Media\Models\Media;

class GroupCategoryService
{
    protected $groupCategoryRepository;

    public function __construct(GroupCategoryRepository $groupCategoryRepository)
    {
        $this->groupCategoryRepository = $groupCategoryRepository;
    }

    public function create($data)
    {
        return $this->groupCategoryRepository->create($data);
    }

    public function getAll($option = [])
    {
        return $this->groupCategoryRepository->getAll($option);
    }

    public function insert($data)
    {
        return $this->groupCategoryRepository->insert($data);
    }

}
