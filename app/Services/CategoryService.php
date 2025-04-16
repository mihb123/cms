<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Modules\Cms\Media\Models\Media;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll($option = [])
    {
        return $this->categoryRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function create($request)
    {
        $type = isset($request['module']) && $request['module'] ? $request['module'] : 'tag';
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'description' => $request['description'] ?? null,
            'url' => $request['url'] ?? null,
            'status' => intval($request['status']),
            'destination_guide_id' => $request['destination_guide_id'] ?? null,
            'sort' => $now,
            'type' => $type,
        ];
        $request['module'] = $type;

        if (isset($request['avatar']) && $request['avatar'])
        {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        if (isset($request['avatar_sp']) && $request['avatar_sp'])
        {
            $avatarSp = Media::firstOrNew(['id' => $request['avatar_sp']], []);
            $data['avatar_sp'] = $avatarSp->getEmbedded()->toarray();
        }

        if (isset($request['icon']) && $request['icon']) {
            $icon = Media::firstOrNew(['id' => $request['icon']], []);
            $data['icon'] = $icon->getEmbedded()->toarray();
        }

        return $this->categoryRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $type = isset($request['module']) && $request['module'] ? $request['module'] : 'tag';
        $data = [
            'title' => $request['title'],
            'description' => $request['description'] ?? null,
            'url' => $request['url'] ?? null,
            'status' => intval($request['status']),
            'destination_guide_id' => $request['destination_guide_id'] ?? null,
            'type' => $type,
        ];
        $request['module'] = $type;

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        } else {
            $data['avatar'] = null;
        }

        if (isset($request['avatar_sp']) && $request['avatar_sp'])
        {
            $avatarSp = Media::firstOrNew(['id' => $request['avatar_sp']], []);
            $data['avatar_sp'] = $avatarSp->getEmbedded()->toarray();
        } else {
            $data['avatar_sp'] = null;
        }

        if (isset($request['icon']) && $request['icon']) {
            $icon = Media::firstOrNew(['id' => $request['icon']], []);
            $data['icon'] = $icon->getEmbedded()->toarray();
        } else {
            $data['icon'] = null;
        }

        return $this->categoryRepository->update($data, $id, $request);
    }

    public function destroy($id)
    {
        return $this->categoryRepository->destroy($id);
    }

    public function getAjaxPost($request, $type , $module)
    {
        return $this->categoryRepository->getAjaxPost($request, $type, $module);
    }

    public function getAjaxTag($request, $type = null)
    {
        return $this->categoryRepository->getAjaxTag($request, $type);
    }

    public function getAjaxProduct($request, $type = null, $module)
    {
        return $this->categoryRepository->getAjaxProduct($request, $type, $module);
    }

    public function changeSort($request)
    {
        return $this->categoryRepository->changeSort($request);
    }

    public function display($request)
    {
        return $this->categoryRepository->display($request);
    }
}
