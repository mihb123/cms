<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Repositories\ProductRepository;
use Modules\Cms\Media\Models\Media;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll($option = [])
    {
        return $this->productRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function create($request)
    {
        $now = date('Y-m-d H:i:s');
        $data = [
            'title' => $request['title'],
            'description' => $request['description'],
            'note' => $request['note'],
            'content' => $request['content'] ?? null,
            'sort' => $now,
            'star' => $request['star'] ?? 0
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        if (isset($request['image_slider']) && $request['image_slider']) {
            foreach ($request['image_slider'] as $key => $item) {
                $avatar = Media::firstOrNew(['id' => $item], []);
                $data['image_slider'][] = $avatar->getEmbedded()->toarray();
            }
        }

        return $this->productRepository->create($data, $request);
    }

    public function update($request, $id)
    {

        $data = [
            'title' => $request['title'],
            'description' => $request['description'],
            'note' => $request['note'],
            'content' => $request['content'] ?? null,
            'star' => $request['star'] ?? 0
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        if (isset($request['image_slider']) && $request['image_slider']) {
            foreach ($request['image_slider'] as $key => $item) {
                $avatar = Media::firstOrNew(['id' => $item], []);
                $data['image_slider'][] = $avatar->getEmbedded()->toarray();
            }
        }

        return $this->productRepository->update($data, $id, $request);
    }

    public function destroy($id)
    {
        return $this->productRepository->destroy($id);
    }

    public function getAjax($request)
    {
        return $this->productRepository->getAjax($request);
    }

    public function changeSort($request)
    {
        return $this->productRepository->changeSort($request);
    }
}
