<?php

namespace App\Services;

use App\Repositories\MenuRepository;
use App\Repositories\SiteMapManageRepository;
use Modules\Cms\Media\Models\Media;

class SiteMapManageService
{
    protected $siteMapManageRepository;

    public function __construct(SiteMapManageRepository $siteMapManageRepository)
    {
        $this->siteMapManageRepository = $siteMapManageRepository;
    }

    public function getAll()
    {
        return $this->siteMapManageRepository->getAll();
    }

    public function find($id)
    {
        return $this->siteMapManageRepository->find($id);
    }

    public function general()
    {
        return $this->siteMapManageRepository->general();
    }

    public function create($request)
    {
        $data = [
            'content' => $request['sitemap'] ?? [],
            'status' => 0,
        ];
        return $this->siteMapManageRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $sitemap = $this->find($id);
        $content = '';
        if (isset($request['sitemap'])) {
            if (!$sitemap['content']) {
                $content = $request['sitemap'];
            } else {
                $arrayDiff = array_diff($request['sitemap'], $sitemap['content']);
                if ($arrayDiff) {
                    $content = array_merge($sitemap['content'], $arrayDiff);
                } else {
                    $arrayDiff = array_diff($sitemap['content'], $request['sitemap']);
                    if ($arrayDiff) {
                        $content = $sitemap['content'];
                        foreach ($arrayDiff as $key => $value) {
                            unset($content[$key]);
                        }
                        $content = $content;
                    } else {
                        $content = $sitemap['content'];
                    }
                }
            }

            $data = [
                'content' => $content,
                'status' => isset($request['status']) ? 1 : 0,
            ];

            return $this->siteMapManageRepository->update($data, $id);
        } else {
            return $this->siteMapManageRepository->destroy($id);
        }

    }

}
