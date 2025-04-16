<?php
namespace App\Services;

use App\Repositories\FamilyMemberTagGroupRepository;

use Modules\Cms\Media\Models\Media;

class FamilyMemberTagGroupService
{
    protected $familyMemberTagGroupRepository;

    public function __construct(FamilyMemberTagGroupRepository $familyMemberTagGroupRepository)
    {
        $this->familyMemberTagGroupRepository = $familyMemberTagGroupRepository;
    }

    public function getAll()
    {
        return $this->familyMemberTagGroupRepository->getAll();
    }

    public function find($id)
    {
        return $this->familyMemberTagGroupRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'] ?? '',
            'status' => intval($request['status']),
            'sort' => $now,
        ];

        return $this->familyMemberTagGroupRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'] ?? '',
            'status' => intval($request['status']),
        ];

        return $this->familyMemberTagGroupRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->familyMemberTagGroupRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->familyMemberTagGroupRepository->destroy($id);
    }
}
