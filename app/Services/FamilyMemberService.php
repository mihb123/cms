<?php
namespace App\Services;

use Illuminate\Support\Str;
use App\Repositories\AdminRepository;
use App\Repositories\FamilyMemberRepository;
use Modules\Cms\Media\Models\Media;

class FamilyMemberService
{
    protected $familyMemberRepository;

    public function __construct(FamilyMemberRepository $familyMemberRepository)
    {
        $this->familyMemberRepository = $familyMemberRepository;
    }

    public function getAll()
    {
        return $this->familyMemberRepository->getAll();
    }

    public function find($id)
    {
        return $this->familyMemberRepository->find($id);
    }

    
    public function create($request)
    {
        $data = [
            'name' => $request['name'],
            'gender' => intval($request['gender']),
            'birthday' => $request['birthday'],
            'address' => $request['address'] ?? '',
            'summary' => $request['summary'] ?? ''
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->familyMemberRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'name' => $request['name'],
            'gender' => intval($request['gender']),
            'birthday' => $request['birthday'],
            'address' => $request['address'] ?? '',
            'summary' => $request['summary'] ?? ''
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->familyMemberRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->familyMemberRepository->destroy($id);
    }

    public function getAjax($request)
    {
        return $this->familyMemberRepository->getAjax($request);
    }

}
