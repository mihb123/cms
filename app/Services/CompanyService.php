<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use Modules\Cms\Media\Models\Media;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAll($option = [])
    {
        return $this->companyRepository->getAll($option);
    }

    public function find($id)
    {
        return $this->companyRepository->find($id);
    }

    public function create($request)
    {
        $data = [
            'name' => $request['name'],
            'summary' => $request['summary'] ?? null,
            'content' => $request['content'] ?? null,
            'zip' => $request['zip'],
            'province' => $request['province'],
            'city' => $request['city'],
            'address' => $request['address'],
            'url_home_page' => $request['url_home_page'] ?? null,
            'url_info' => $request['url_info'] ?? null,
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        }

        return $this->companyRepository->create($data, $request);
    }

    public function update($request, $id)
    {

        $data = [
            'name' => $request['name'],
            'summary' => $request['summary'] ?? null,
            'content' => $request['content'] ?? null,
            'zip' => $request['zip'],
            'province' => $request['province'],
            'city' => $request['city'],
            'address' => $request['address'],
            'url_home_page' => $request['url_home_page'] ?? null,
            'url_info' => $request['url_info'] ?? null,
        ];

        if (isset($request['avatar']) && $request['avatar']) {
            $avatar = Media::firstOrNew(['id' => $request['avatar']], []);
            $data['avatar'] = $avatar->getEmbedded()->toarray();
        } else {
            $data['avatar'] = null;
        }
        return $this->companyRepository->update($data, $id, $request);
    }

    public function destroy($id)
    {
        return $this->companyRepository->destroy($id);
    }

    public function getAjax($request)
    {
        return $this->companyRepository->getAjax($request);
    }

    public function changeSort($request)
    {
        return $this->companyRepository->changeSort($request);
    }
}
