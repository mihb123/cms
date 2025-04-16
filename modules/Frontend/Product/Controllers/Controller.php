<?php

namespace Modules\Frontend\Product\Controllers;

use App\Services\MenuService;
use App\Services\NoticeService;
use App\Services\PostUsefulService;
use View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $topicUsefulService;
    protected $menuService;
    protected $noticeService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostUsefulService $postUsefulService,
        MenuService $menuService,
        NoticeService $noticeService
    ) {
        $this->topicUsefulService = $postUsefulService;
        $this->menuService = $menuService;
        $this->noticeService = $noticeService;
    }
    /**
     * Set controller theme folder
     *
     * @example $this->theme(__DIR__ . '/users');
     * @example $this->theme(__DIR__ . '/users', 'users');
     *
     * @param string $name The theme name
     * @return Controller
     */
    public function theme($path = null, $namespace = null)
    {
    	$path = $path ?? __DIR__;

    	if ($namespace === null) {
    		View::addLocation($path);
    	} else {
    		View::addNamespace($namespace, $path);
    	}

    	return $this;
    }

    /**
     * Get absolute path from relation path
     * @example $this->folder('profile')
     */
    public function folder($path)
    {
    	return __DIR__ . '/' . trim($path, '/');
    }

    public function init()
    {
        $optionUseful = [
            'limit' => 5
        ];

        $optionTopic = [
            'type' => 'topic'
        ];

        $optionNews = [
            'type' => 'news'
        ];

        $optionNotice = [
            'limit' => 3
        ];

        $listUseful = $this->topicUsefulService->getAll();
        $listMenu = $this->menuService->general();
        $listNotice = $this->noticeService->getAll($optionNotice);

        return compact('listUseful', 'listMenu', 'listNotice');
    }
}
