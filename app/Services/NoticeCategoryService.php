<?php
namespace App\Services;
use App\Repositories\NoticeCategoryRepository;

class NoticeCategoryService
{
    protected $noticeCategoryRepository;

    public function __construct(NoticeCategoryRepository $noticeCategoryRepository)
    {
        $this->noticeCategoryRepository = $noticeCategoryRepository;
    }

    public function getAll()
    {
        return $this->noticeCategoryRepository->getAll();
    }

    public function find($id)
    {
        return $this->noticeCategoryRepository->find($id);
    }

    public function create($request)
    {
        $data = [
            'title' => $request['title'],
            'color' => $request['color'],
            'status' => intval($request['status']),
        ];
    
        return $this->noticeCategoryRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'color' => $request['color'],
            'status' => intval($request['status']),
        ];

        return $this->noticeCategoryRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->noticeCategoryRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->noticeCategoryRepository->destroy($id);
    }
}
