<?php

namespace App\Services;

use App\Repositories\NoticeRepository;

class NoticeService
{
    protected $noticeRepository;

    public function __construct(NoticeRepository $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }

    public function getAll($option = [])
    {
        return $this->noticeRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->noticeRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'notice_category_id' => $request['notice_category_id'] ?? '',
            'content' => $request['content'],
            'status' => intval($request['status']),
            'sort' => $now,
            'year' => intval(date('Y')),
        ];
        return $this->noticeRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'notice_category_id' => $request['notice_category_id'] ?? '',
            'content' => $request['content'],
            'status' => intval($request['status']),
            'year' => intval(date('Y')),
        ];

        return $this->noticeRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->noticeRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->noticeRepository->destroy($id);
    }
}
