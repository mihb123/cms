<?php
namespace App\Services;

use App\Repositories\GroupRepository;
use Modules\Cms\Media\Models\Media;

class GroupService
{
    protected $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function find($id)
    {
        return $this->groupRepository->find($id);
    }

    public function getAll($option = [])
    {
        return $this->groupRepository->getAll($option);
    }

    public function create($request)
    {
        $type = isset($request['module']) && $request['module'] ? $request['module'] : 'tag';
        $now = date('Y-m-d H:i:s');
        $data = [
            'title_japan' => $request['title_japan'],
            'title_english' => $request['title_english'] ?? '',
            'status' => intval($request['status']),
            'sort' => $now,
            'type' => $type
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->groupRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $type = isset($request['module']) && $request['module'] ? $request['module'] : 'tag';
        $data = [
            'title_japan' => $request['title_japan'],
            'title_english' => $request['title_english'] ?? '',
            'status' => intval($request['status']),
            'type' => $type
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        } else {
            $data['avatar'] = null;
        }

        return $this->groupRepository->update($data, $id, $request);
    }

    public function getAjax($request)
    {
        return $this->groupRepository->getAjax($request);
    }

    public function getAjaxPost($request)
    {
        return $this->groupRepository->getAjaxPost($request);
    }

    public function getAjaxKeyWords($request)
    {
        return $this->groupRepository->getAjaxKeyWords($request);
    }

    public function getAjaxCalculate($request)
    {
        return $this->groupRepository->getAjaxCalculate($request);
    }

    public function getAjaxCalculateService($request)
    {
        return $this->groupRepository->getAjaxCalculateService($request);
    }

    public function destroy($id)
    {
        return $this->groupRepository->destroy($id);
    }

    public function changeSort($request)
    {
        return $this->groupRepository->changeSort($request);
    }
}
