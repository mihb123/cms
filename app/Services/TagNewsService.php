<?php
namespace App\Services;

use App\Repositories\TagNewsRepository;

class TagNewsService
{
    protected $tagNewsRepository;

    public function __construct(TagNewsRepository $tagNewsRepository)
    {
        $this->tagNewsRepository = $tagNewsRepository;
    }

    public function find($id)
    {
        return $this->tagNewsRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
           'creator_id' => $request['creator_id'],
           'tag_id' => $request['tag_id'],
           'status' => intval($request['status']),
           'sort' => $now,
           'content' => $request['content'] ?? '',
        ];

        return $this->tagNewsRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'creator_id' => $request['creator_id'],
            'tag_id' => $request['tag_id'],
            'status' => intval($request['status']),
            'content' => $request['content'] ?? '',
        ];

        return $this->tagNewsRepository->update($data, $id);
    }

    public function getDetail($option)
    {
        return $this->tagNewsRepository->getDetail($option);
    }

    public function destroy($id)
    {
        return $this->tagNewsRepository->destroy($id);
    }

    public function getAjax($request)
    {
        return $this->tagNewsRepository->getAjax($request);
    }

    public function changeSort($request)
    {
        return $this->tagNewsRepository->changeSort($request);
    }
}
