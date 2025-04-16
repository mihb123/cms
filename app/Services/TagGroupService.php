<?php
namespace App\Services;

use App\Repositories\TagGroupRepository;

class TagGroupService
{
    protected $tagGroupRepository;

    public function __construct(TagGroupRepository $tagGroupRepository)
    {
        $this->tagGroupRepository = $tagGroupRepository;
    }

    public function find($id)
    {
        return $this->tagGroupRepository->find($id);
    }

    public function getAll($option = [])
    {
        return $this->tagGroupRepository->getAll($option);
    }

    public function create($data)
    {
        return $this->tagGroupRepository->create($data);
    }

    public function getDetail($option)
    {
        return $this->tagGroupRepository->getDetail($option);
    }

    public function destroy($id)
    {
        return $this->tagGroupRepository->destroy($id);
    }
}
