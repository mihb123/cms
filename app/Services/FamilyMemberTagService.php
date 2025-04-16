<?php
namespace App\Services;

use App\Repositories\FamilyMemberTagRepository;

use Modules\Cms\Media\Models\Media;

class FamilyMemberTagService
{
    protected $familyMemberTagRepository;

    public function __construct(FamilyMemberTagRepository $familyMemberTagRepository)
    {
        $this->familyMemberTagRepository = $familyMemberTagRepository;
    }

    public function getAll()
    {
        return $this->familyMemberTagRepository->getAll();
    }

    public function find($id)
    {
        return $this->familyMemberTagRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'tag_group_family_member_id' => $request['tag_group_family_member_id'],
            'title' => $request['title'] ?? '',
            'status' => intval($request['status']),
            'sort' => $now,
        ];

        return $this->familyMemberTagRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $data = [
            'tag_group_family_member_id' => $request['tag_group_family_member_id'],
            'title' => $request['title'] ?? '',
            'status' => intval($request['status']),
        ];

        return $this->familyMemberTagRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->familyMemberTagRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->familyMemberTagRepository->destroy($id);
    }
}
