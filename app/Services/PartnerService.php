<?php
namespace App\Services;

use App\Repositories\PartnerRepository;
use Modules\Cms\Media\Models\Media;

class PartnerService
{
    protected $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function getAll()
    {
        return $this->partnerRepository->getAll();
    }

    public function find($id)
    {
        return $this->partnerRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'url' => $request['url'],
            'status' => intval($request['status']),
            'sort' => $now,
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }
        return $this->partnerRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'url' => $request['url'],
            'status' => intval($request['status']),
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->partnerRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->partnerRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->partnerRepository->destroy($id);
    }
}
