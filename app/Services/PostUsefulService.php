<?php
namespace App\Services;

use App\Repositories\PostUsefulRepository;
use Modules\Cms\Media\Models\Media;

class PostUsefulService
{
    protected $postUsefulRepository;

    public function __construct(PostUsefulRepository $postUsefulRepository)
    {
        $this->postUsefulRepository = $postUsefulRepository;
    }

    public function getAll($option = [])
    {
        return $this->postUsefulRepository->getAll($option);
    }

    public function getAllUser($option = [])
    {
        return $this->postUsefulRepository->getAllUser($option);
    }

    public function find($id)
    {
        return $this->postUsefulRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'creator_id' => $request['creator_id'],
            'category_id' => $request['category_id'],
            'content' => $request['content'] ?? '',
            'url' => $request['url'],
            // 'summary' => $request['summary'],
            'slug' => slug($request['title']),
            'status' => intval($request['status']),
            'sort' => $now,
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        if (isset($request['icon']) && $request['icon']) {
            $icon= Media::firstOrNew(['id' => $request['icon']], []);
            $data['icon'] = $icon->getEmbedded()->toarray();
        }

        return $this->postUsefulRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'creator_id' => $request['creator_id'],
            'category_id' => $request['category_id'],
            'url' => $request['url'],
            // 'summary' => $request['summary'],
            'content' => $request['content'] ?? '',
            'slug' => slug($request['title']),
            'status' => intval($request['status']),
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        if (isset($request['icon']) && $request['icon']) {
            $icon= Media::firstOrNew(['id' => $request['icon']], []);
            $data['icon'] = $icon->getEmbedded()->toarray();
        }
        return $this->postUsefulRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->postUsefulRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->postUsefulRepository->destroy($id);
    }

    public function changeSort($request)
    {
        return $this->postUsefulRepository->changeSort($request);
    }
}
