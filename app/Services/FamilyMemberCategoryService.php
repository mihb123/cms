<?php
namespace App\Services;

use App\Repositories\FamilyMemberCategoryRepository;

use Modules\Cms\Media\Models\Media;

class FamilyMemberCategoryService
{
    protected $familyMemberCategoryRepository;

    public function __construct(FamilyMemberCategoryRepository $familyMemberCategoryRepository)
    {
        $this->familyMemberCategoryRepository = $familyMemberCategoryRepository;
    }

    public function getAll()
    {
        return $this->familyMemberCategoryRepository->getAll();
    }

    public function find($id)
    {
        return $this->familyMemberCategoryRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'] ?? '',
            'status' => intval($request['status']),
            'sort' => $now,
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->familyMemberCategoryRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'] ?? '',
            'status' => intval($request['status']),
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
           
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }
        return $this->familyMemberCategoryRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->familyMemberCategoryRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->familyMemberCategoryRepository->destroy($id);
    }
}
