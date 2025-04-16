<?php
namespace App\Services;

use App\Repositories\PostsTopicRepository;
use Modules\Cms\Media\Models\Media;

class PostsTopicService
{
    protected $postsTopicRepository;

    public function __construct(PostsTopicRepository $postsTopicRepository)
    {
        $this->postsTopicRepository = $postsTopicRepository;
    }

    public function getAll($option = [])
    {
        return $this->postsTopicRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->postsTopicRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'creator_id' => $request['creator_id'],
            'category_id' => $request['category_id'],
            'content' => $request['content'] ?? '',
            'position' => $request['position'],
             'summary' => $request['summary'],
            'slug' => slug($request['title']),
            'status' => intval($request['status']),
            'sort' => $now,
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        if (isset($request['icon']) && $request['icon']) {
            $icon= Media::firstOrNew(['id' => $request['icon']], []);
            $data['icon'] = $icon->getEmbedded()->toarray();
        }

        return $this->postsTopicRepository->create($data);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'creator_id' => $request['creator_id'],
            'category_id' => $request['category_id'],
             'summary' => $request['summary'],
            'content' => $request['content'] ?? '',
            'position' => $request['position'],
            'slug' => slug($request['title']),
            'status' => intval($request['status']),
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        if ($request['icon']) {
            $icon= Media::firstOrNew(['id' => $request['icon']], []);
            $data['icon'] = $icon->getEmbedded()->toarray();
        }

        return $this->postsTopicRepository->update($data, $id);
    }

    public function getAjax($request)
    {
        return $this->postsTopicRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->postsTopicRepository->destroy($id);
    }

    public function changeSort($request)
    {
        return $this->postsTopicRepository->changeSort($request);
    }
}
