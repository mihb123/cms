<?php

namespace Modules\Cms\Menu\Controllers;

use App\Helpers\CommonHelper;
use App\Common\Response;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use App\Services\GroupCategoryService;
use Auth;
use Datatables;
use View;

use Illuminate\Http\Request;

use App\Menu;
use App\Services\MenuService;

class MenuController extends Controller
{
    protected $categoryService;
    protected $menuService;

    public function __construct(CategoryService $categoryService, MenuService $menuService)
    {
        $this->categoryService = $categoryService;
        $this->menuService = $menuService;
    }

    public function index()
    {
        $tag = $post = $listCateByMenu = [];
        $optionTag = [
            'type' => 'tag'
        ];
        $listCategoryTag = $this->categoryService->getAll($optionTag);

        if ($listCategoryTag) {
            foreach ($listCategoryTag as $key => $items) {
                $tag[$items['id']] = $items;
            }
        }

        $optionPost = [
            'type' => 'posts'
        ];
        $listCategoryPosts = $this->categoryService->getAll($optionPost);

        if ($listCategoryPosts) {
            foreach ($listCategoryPosts as $key => $items) {
                $post[$items['id']] = $items;
            }
        }

        $menu = $this->menuService->getAll();

        return view('menu::index', compact('listCategoryTag', 'listCategoryPosts', 'menu', 'tag', 'post'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->menuService->create($data);

        if ($result) {
            return redirect()->back()->with('success', __('menu::messages.success'));
        }
        return redirect()->back()->withErrors(__('menu::messages.failed'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $result = $this->menuService->update($data, $id);
        if ($result) {
            return redirect()->back()->with('success',  __('menu::messages.success'));
        }
        return redirect()->back()->withErrors(__('menu::messages.failed_edit'));
    }
}
