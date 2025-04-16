<?php
namespace App\Services;
use App\Repositories\SiteMapRepository;

class SiteMapService
{
    protected $siteMapRepository;

    public function __construct(SiteMapRepository $siteMapRepository)
    {
        $this->siteMapRepository = $siteMapRepository;
    }

    public function getAll()
    {
        return $this->siteMapRepository->getAll();
    }

    public function find($id)
    {
        return $this->siteMapRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'content' => $request['content'] ?? '',
            'status' => intval($request['status']),
            'sort' => $now,
        ];
        return $this->siteMapRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'content' => $request['content'] ?? '',
            'status' => intval($request['status']),
        ];

        return $this->siteMapRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->siteMapRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->siteMapRepository->destroy($id);
    }

    public function changeSort($request)
    {
        return $this->siteMapRepository->changeSort($request);
    }
}
