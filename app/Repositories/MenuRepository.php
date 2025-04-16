<?php

namespace App\Repositories;

use Datatables;
use App\Helpers\CommonHelper;
use App\Models\Menu;
use App\Services\CategoryService;
use App\Services\PostsService;
use Illuminate\Support\Str;

class MenuRepository
{
    protected $model;
    protected $categoryService;
    protected $postsService;


    public function __construct(
        Menu $model,
        CategoryService $categoryService,
        PostsService $postsService
    ) {
        $this->model = $model;
        $this->categoryService = $categoryService;
        $this->postsService = $postsService;
    }

    public function getAll($option = [])
    {
        $result = $this->model::query()->first();

        return $result;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data, $request)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->updateOrCreate(['id' => $id], $data);
    }

    public function general()
    {
        $menu = $this->getAll();
        $tag = $post = $ids = $categoryTags = $tagGroups = $listCategoryPost = $listCategoryTag = $nameCategory = $categories = $postsGroup = $catePost = [];

        if (isset($menu['content']) && $menu['content']) {
            foreach ($menu['content'] as $key => $item) {
                $ids[] = $item;
            }
        }
        if ($ids) {
            $listCategory = $this->categoryService->getAll(['ids' => $ids]);
            foreach ($listCategory as $key => $category) {
                $nameCategory[$category['id']] = $category['title'];
                $categories[$category['id']] = $category;
            }

            $optionTag = [
                'type' => 'tag',
                'ids' => $ids
            ];

            $optionPost = [
                'type' => 'posts',
                'ids' => $ids
            ];

            $listCategoryPost = $this->categoryService->getAll($optionPost);

            if ($listCategoryPost) {
                foreach ($listCategoryPost as $key => $category) {
                    if ($category->postCategory) {
                        foreach ($category->postCategory as $keyPostCategory => $postCategory) {
                            if (!empty($postCategory->post)) {
                                $catePost[$postCategory->category_id][] = $postCategory->post;
                            }
                        }
                    }

                    if ($category->groupPosts) {
                        foreach ($category->groupPosts as $keyGroup => $groupPosts) {
                            $listGroup[] = $groupPosts->group;
                            if ($groupPosts->posts) {
                                foreach ($groupPosts->posts as $keyPost => $itemPost) {
                                    $idsCategory[$category->id][] = $itemPost->post_id;
                                }
                            }
                        }
                    }
                }
            }
            foreach ($idsCategory as $key => $idCategory) {
                $postSoft[$key] = $this->postsService->getAll(['updated_at' => 'desc', 'idPosts' => $idCategory]);
            }

            // if ($listCategoryPost) {
            //     foreach ($listCategoryPost as $key => $categoryPost) {
            //         if ($categoryPost->groupPosts) {
            //             foreach ($categoryPost->groupPosts as $keyGroup => $groupPosts) {
            //                 $catePost[$categoryPost->id][] = $groupPosts;
            //                 if ($groupPosts->listPost) {
            //                     foreach ($groupPosts->listPost as $keyPost => $itemPost) {
            //                         $postsGroup[$categoryPost->id][] = $itemPost;
            //                     }
            //                 }
            //             }
            //         }
            //     }
            // }

            $listCategoryTag = $this->categoryService->getAll($optionTag);

            if ($listCategoryTag) {
                foreach ($listCategoryTag as $key => $categoryTag) {
                    if ($categoryTag->groupTag) {
                        foreach ($categoryTag->groupTag as $keyGroup => $groupTag) {
                            if ($groupTag->group) {
                                $categoryTags[$categoryTag['id']][] = $groupTag->group;
                            }
                            if ($groupTag->listTag) {
                                foreach ($groupTag->listTag as $keyTag => $group) {
                                    $tagGroups[$categoryTag['id']][$groupTag['group_id']][] = $group->tag;
                                }
                            }
                        }
                    }
                }
            }
        }

        return compact('categoryTags', 'menu', 'tagGroups', 'nameCategory', 'categories', 'postsGroup', 'catePost', 'postSoft');
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        return $result->delete();
    }
}
