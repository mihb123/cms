<?php
namespace App\Services;
use App\Repositories\CreatorRepository;
use Modules\Cms\Media\Models\Media;

class CreatorService
{
    protected $creatorRepository;

    public function __construct(CreatorRepository $creatorRepository)
    {
        $this->creatorRepository = $creatorRepository;
    }

    public function getAll()
    {
        return $this->creatorRepository->getAll();
    }

    public function find($id)
    {
        return $this->creatorRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'name' => $request['name'],
            'summary' => $request['summary'] ?? '',
            'status' => intval($request['status']),
            'sort' => $now,
            'gender' => $request['gender'] ?? null,
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }
        return $this->creatorRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'name' => $request['name'],
            'summary' => $request['summary'] ?? '',
            'status' => intval($request['status']),
            'gender' => $request['gender'] ?? null,
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->creatorRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->creatorRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->creatorRepository->destroy($id);
    }
}
