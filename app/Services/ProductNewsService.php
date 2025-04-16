<?php

namespace App\Services;

use App\Repositories\ProductNewsRepository;
use Modules\Cms\Media\Models\Media;

class ProductNewsService
{
    protected $productNewsRepository;

    public function __construct(ProductNewsRepository $productNewsRepository)
    {
        $this->productNewsRepository = $productNewsRepository;
    }

    public function getAll($option = [])
    {
        return $this->productNewsRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->productNewsRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'url' => $request['url'],
            'sort' => $now
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->productNewsRepository->create($data, $request);
    }

    public function update($request, $id)
    {

        $data = [
            'title' => $request['title'],
            'url' => $request['url'],
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->productNewsRepository->update($data, $id, $request);
    }

    public function destroy($id)
    {
        return $this->productNewsRepository->destroy($id);
    }

    public function getAjax($request)
    {
        return $this->productNewsRepository->getAjax($request);
    }

    public function changeSort($request)
    {
        return $this->productNewsRepository->changeSort($request);
    }

    public function display($request)
    {
        return $this->productNewsRepository->display($request);
    }
}
