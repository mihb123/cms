<?php
namespace App\Services;

use Illuminate\Support\Str;
use App\Repositories\AdminRepository;
use App\Repositories\FamilyMemberNewsRepository;
use App\Repositories\FamilyMemberRepository;
use Modules\Cms\Media\Models\Media;

class FamilyMemberNewsService
{
    protected $familyMemberNewsRepository;

    public function __construct(FamilyMemberNewsRepository $familyMemberNewsRepository)
    {
        $this->familyMemberNewsRepository = $familyMemberNewsRepository;
    }

    public function getAll($option = [])
    {
        return $this->familyMemberNewsRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->familyMemberNewsRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'family_member_id' => intval($request['family_member_id']),
            'title' => $request['title'],
            'tag_id' => intval($request['tag_id']),
            'patient_birthday' => intval($request['patient_birthday']),
            'treatment_place' => $request['treatment_place'],
            'disease_month_start' => intval($request['disease_month_start']),
            'disease_year_start' => intval($request['disease_year_start']),
            'disease_day_start' => intval($request['disease_day_start']),
            'patient_relationship' => $request['patient_relationship'],
            'patient_relationship_en' => $request['patient_relationship_en'],
            'family_member_category_id' => $request['family_member_category_id'],
            'content' => $request['content'] ?? '',
            'sort' => $now,
            'type' => intval($request['type']),
            'status' => intval($request['status']),
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->familyMemberNewsRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'family_member_id' => intval($request['family_member_id']),
            'title' => $request['title'],
            'tag_id' => intval($request['tag_id']),
            'patient_birthday' => intval($request['patient_birthday']),
            'treatment_place' => $request['treatment_place'],
            'disease_month_start' => intval($request['disease_month_start']),
            'disease_year_start' => intval($request['disease_year_start']),
            'disease_day_start' => intval($request['disease_day_start']),
            'patient_relationship' => $request['patient_relationship'],
            'patient_relationship_en' => $request['patient_relationship_en'],
            'family_member_category_id' => $request['family_member_category_id'],
            'content' => $request['content'] ?? '',
            'type' => intval($request['type']),
            'status' => intval($request['status']),
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->familyMemberNewsRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->familyMemberNewsRepository->destroy($id);
    }

    public function getAjax($request)
    {
        return $this->familyMemberNewsRepository->getAjax($request);
    }

}
