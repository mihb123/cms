<?php
namespace App\Helpers;

use App\Menu;
use App\MenuOrg;
use App\UserRole;
use Auth;
use GuzzleHttp\Client;
use App\Helpers\LogHelper;
use Crypt;
use JWTAuth;
use JWTAuthException;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Modules\Frontend\Meeting\Models\Meeting;
use Modules\Frontend\Role\Models\Role;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

use App\Jobs\ServiceWorker;
use App\Mailer\ServiceMailer;

use Modules\Frontend\Category\Models\Category;

class CommonHelper
{
    protected $log;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
//        parent::__construct();
        $this->log = new LogHelper(config('constants.log_common_helper'));
    }

    public static function vnToStr ($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );

        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ','_',$str);

        return strtolower($str);
    }



    public static function getMarkupAction($data, $module, $routeCus = null) {
        $html = '';
        // Check for edit action
        if (Auth::user()->can($module . '.update', $data)) {
            $html .= '<a title="' . __($module . '::messages.edit') . '" href="' . route($module . '.edit',  $data->id) . '" class="btn btn-warning btn-xs" style="display:inline;padding:5px 10px 5px 10px;margin-right:5px;"><i style="padding-right: 0px; color: #fff" class="fa fa-pencil-alt"></i></a>';
        }

        if (Auth::user()->can($module . '.delete', $data)) {
            $htmlFrom = '<div class="modal-dialog" role="document">
                                <form action="' . route($module . '.destroy', $data->id) .'" method="POST" accept-charset="UTF-8">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #dc4e41">
                                            <h1 class="modal-title" style="color: whitesmoke" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> 警告</h1>
											 <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">';
            $htmlFrom .=                    csrf_field();
            $htmlFrom .=                    '<input name="_method" type="hidden" value="DELETE">
                                            <p class="text-center" style="color: #dc4e41">消去してもよろしいですか？</p>
                                        </div>
                                        <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">ティーチャイ</button>
											<button type="submit" class="btn btn-google">同意する</button>
									    </div>
                                    </div>
                                </form>
                        </div>';
            $htmlFrom = base64_encode($htmlFrom);
            $html .= '<a title="' . __($module . '::messages.deleted') . '" class="btn btn-google btn-xs" type="button" data-toggle="modal" data-target="#confirmModal" style="display:inline;padding:5px 10px 5px 10px;margin-right:5px;" onclick="deleteData(\'' . $htmlFrom . '\')""><i style="padding-right: 0px; color: #fff" class="fa fa-trash-alt"></i></a>';
        }

        if (!empty($routeCus)){
            $html .= '<a href="' . route($routeCus,$data->id) . '" class="btn btn-info btn-xs" style="display:inline;padding:5px 10px 5px 10px;margin-right:5px;" title="' . __($module . '::messages.list_lesson') . '"><i style="padding-right: 0px; color: #fff" class="ion ion-ios-book-outline"></i></a>';
        }

        return $html;
    }

    public static function getMarkupStatus($data, $module)
    {
        if ($data->status == config("constants.status_verified")) {
            return '<span class="btn btn-outline-success">' . __($module . '::messages.active') . '</span>';
        } else if ($data->status == config("constants.status_deleted")) {
            return '<span class="btn btn-danger">' . __('category::messages.deleted') . '</span>';
        } else if ($data->status == config("constants.status_draft")) {
            return '<span class="btn btn-outline-warning">' . __($module . '::messages.unactive') . '</span>';
        } else {
            return '<span class="btn btn-default">' . __($module . '::messages.unknow') . '</span>';
        }
    }

    public static function getAjaxMarkupAction($data, $module, $token) {
        $html = '';

        if (Auth::user()->can($module . '.view', $data)) {
            $html.= '<a title="' . __('messages.title_view') . '" href="javascript:;" onclick="processAction(' . ACTION_VIEW . ', \'' . $data->_id . '\', \'' . $module . '\')" class="btn btn-secondary btn-sm mr-2" ><i class="fa fa-eye"></i></a>';
        }
        if (Auth::user()->can($module . '.update', $data)) {
            $html.= '<a title="' . __('messages.title_view') . '" href="javascript:;" onclick="processAction(' . ACTION_EDIT. ', \'' . $data->_id . '\', \'' . $module . '\')" class="btn btn-secondary btn-sm mr-2" ><i class="fa fa-pencil-alt"></i></a>';
        }
        if (Auth::user()->can($module . '.delete', $data)) {
            $html.= '<a title="' . __('messages.title_deleted') . '" href="javascript:;" id="item-' . $data->_id . '" onclick="processDelete(\'' . $data->_id . '\', \'' . $module .'\', \'' . $token . '\')" class="btn btn-secondary btn-sm" ><i class="fa fa-trash-alt"></i></a>';
        }

        return $html;
    }

    public static function getLink($link) {
        if (empty($link)) {
            return '';
        }
        if ((strpos($link, 'http') === 0)
            || (strpos($link, 'https') === 0)
        ) {
            return $link;
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $https = 'https://';
        } else {
            $https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
        }

        $link = $https . $_SERVER['HTTP_HOST'] . '/' . $link;

        return $link;
    }



    public static function post($url, $body, $auth = null)
    {
        try {
            $client   = new Client();
            $response = $client->request('post', $url, [
                'headers' => [
                    'Content-Type'    => 'application/json;charset=UTF-8'
                ],
                'body' => $body,
            ]);

            return $response->getBody()->getContents();
        } catch (\Exception $ex) {
            return json_encode([
                'status' => 'error',
            ]);
        }
    }


    public static function numberFormat($price){
        return number_format($price);
    }

    public static function getTree($datas, $parent= 0, $arr_children = array(), $space = '')
    {
        foreach ($datas as $a) {
            if($parent == $a['parent']) {
                $arr_children[] = [
                    'id' => $a['id'],
                    'parent' => $a['parent'],
                    'name' => $space . ' '. $a['name']
                ];
                $arr_children = self::getTree($datas, $a['id'] , $arr_children,  $space . '--');
            }
        }

        return $arr_children;
    }


    public static function getTreeCate($flat, $root = 0) {
        $parents = array();
        foreach ($flat as $a) {
            $a->thumb = $a->avatar->image;
            $parents[$a->parent][] = $a;
        }

        return self::createBranch($parents, $parents[$root]);
    }

    public static function createBranch(&$parents, $children) {
        $tree = array();
        foreach ($children as $child) {
            if (isset($parents[$child['_id']])) {
                $child['childrens'] = self::createBranch($parents, $parents[$child['_id']]);
            }

            $tree[] = $child;
        }

        return $tree;
    }

    public static function hasChildren($rows, $id) {
        foreach ($rows as $row) {
            if ($row['parentid'] == $id) {
                return true;
            }
        }

        return false;
    }


    public static function getTreeByData($data, $parent = 0, $resultArr = array(), $space = '') {
        foreach ($data as $value) {
            if($parent == $value['parent_id']) {
                $value['name_tree'] = $space . ' ' . $value['name'];
                $resultArr[] = $value;
                $resultArr = self::getTreeByData($data, $value['_id'] , $resultArr,  $space . '--');
            }
        }

        return $resultArr;
    }

}
