<?php
namespace App\Services;

use App\Repositories\PostsTopicRepository;
use App\Repositories\PostsTypeRepository;
use Modules\Cms\Media\Models\Media;

class PostsTypeService
{
    protected $postsTypeRepository;

    public function __construct(PostsTypeRepository $postsTypeRepository)
    {
        $this->postsTypeRepository = $postsTypeRepository;
    }

    public function getAll($option = [])
    {
        return $this->postsTypeRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->postsTypeRepository->find($id);
    }

    public function create($request)
    {
        $data = [
            'title' => $request['title'],
            'color' => $request['color'],
            'status' => intval($request['status']),
        ];
        return $this->postsTypeRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'color' => $request['color'],
            'status' => intval($request['status']),
        ];

        return $this->postsTypeRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->postsTypeRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->postsTypeRepository->destroy($id);
    }
}
