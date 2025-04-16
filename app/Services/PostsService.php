<?php
namespace App\Services;

use App\Repositories\PostsRepository;
use Modules\Cms\Media\Models\Media;

class PostsService
{
    protected $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function getAll($option = [])
    {
        return $this->postsRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->postsRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'title_english' => $request['title_english'],
            'article_type' => $request['article_type'] ?? null,
            'creator_id' => $request['creator_id'],
            'post_type_id' => is_numeric($request['post_type_id']) ? $request['post_type_id'] : null,
            // 'group_id' => $request['group_id'],
            'content' => $request['content'] ?? null,
            'slug' => slug($request['title']),
            'status' => intval($request['status']),
            'sort' => $now
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->postsRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'title_english' => $request['title_english'],
            'article_type' => $request['article_type'] ?? null,
            'creator_id' => $request['creator_id'],
            'post_type_id' => is_numeric($request['post_type_id']) ? $request['post_type_id'] : null,
            // 'group_id' => $request['group_id'],
            'content' => $request['content'] ?? null,
            'slug' => slug($request['title']),
            'status' => intval($request['status'])
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->postsRepository->update($data, $id, $request);
    }

    public function getAjax($request)
    {
        return $this->postsRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->postsRepository->destroy($id);
    }

    public function changeSort($request)
    {
        return $this->postsRepository->changeSort($request);
    }

    public function displayTop($request)
    {
        return $this->postsRepository->displayTop($request);
    }
}
