<?php

namespace App\Services;

use App\Repositories\MenuRepository;
use Modules\Cms\Media\Models\Media;

class MenuService
{
    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function getAll()
    {
        return $this->menuRepository->getAll();
    }

    public function general()
    {
        return $this->menuRepository->general();
    }

    public function find($id)
    {
        return $this->menuRepository->find($id);
    }

    public function create($request)
    {
        $data = [
            'content' => $request['menus'] ?? [],
            'status' => 0,
        ];
        return $this->menuRepository->create($data, $request);
    }

    public function update($request, $id)
    {
        $menu = $this->find($id);
        if (isset($request['menus'])) {
            if (!$menu['content']) {
                $menus = $request['menus'];
            } else {
                $arrayDiff = array_diff($request['menus'], $menu['content']);

                if ($arrayDiff) {
                    $menus = array_merge($menu['content'], $arrayDiff);
                } else {
                    $arrayDiff = array_diff($menu['content'], $request['menus']);

                    if ($arrayDiff) {
                        $content = $menu['content'];
                        foreach ($arrayDiff as $key => $value) {
                            unset($content[$key]);
                        }
                        $menus = $content;
                    } else {
                        $menus = $menu['content'];
                    }
                }
            }

            if (isset($request['save_sitemap'])) {
                $siteMap= $request['menu_sitemap'] ?? '';
                $menus = $request['menus'];
            } else {
                $siteMap= $menu['sitemap'] ?? '';
            }

            $data = [
                'content' => $menus,
                'sitemap' => $siteMap,
                'status' => isset($request['status']) ? 1 : 0,
            ];

            return $this->menuRepository->update($data, $id);
        } else {
            return $this->menuRepository->destroy($id);
        }
    }

}
