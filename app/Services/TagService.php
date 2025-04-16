<?php
namespace App\Services;
use App\Repositories\TagRepository;
use Modules\Cms\Media\Models\Media;

class TagService
{
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getAll($option = null)
    {
        return $this->tagRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->tagRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'title_english' => $request['title_english'],
            'slug' => slug($request['title']),
            'status' => intval($request['status']),
            'sort' => $now,
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }
        return $this->tagRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $data = [
            'title' => $request['title'],
            'title_english' => $request['title_english'],
            'slug' => slug($request['title']),
            'status' => intval($request['status']),
        ];

        if ($request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->tagRepository->update($data, $id, $request);
    }

    public function getAjax($request)
    {
        return $this->tagRepository->getAjax($request);
    }

    public function destroy($id)
    {
        return $this->tagRepository->destroy($id);
    }

    public function changeSort($request)
    {
        return $this->tagRepository->changeSort($request);
    }
}
