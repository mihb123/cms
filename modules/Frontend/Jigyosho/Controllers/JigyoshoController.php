<?php

namespace Modules\Frontend\Jigyosho\Controllers;

use Illuminate\Http\Request;
use Modules\Frontend\Jigyosho\Services\MapService;

class JigyoshoController extends Controller
{
    protected $mapService;

    public function __construct(MapService $mapService) 
    {
        $this->mapService = $mapService;
    }

    public function index()
    {
        $districts = [
            '足立区',
            '江戸川区',
            '北区',
            '渋谷区',
            '墨田区',
            '中央区',
            '中野区',
            '港区',
            '荒川区',
            '大田区',
            '江東区',
            '新宿区',
            '世田谷区',
            '千代田区',
            '練馬区',
            '目黒区',
            '板橋区',
            '葛飾区',
            '品川区',
            '杉並区',
            '台東区',
            '豊島区',
            '文京区'
        ];

        $cities = [
            "昭島市",
            "あきる野市",
            "稲城市",
            "青梅市",
            "清瀬市",
            "国立市",
            "小金井市",
            "国分寺市",
            "小平市",
            "狛江市",
            "立川市",
            "多摩市",
            "調布市",
            "西東京市",
            "八王子市",
            "羽村市",
            "東久留米市",
            "東村山市",
            "東大和市",
            "東大和市",
            "府中市",
            "福生市",
            "町田市",
            "三鷹市",
            "武蔵野市",
            "武蔵村山市"
        ];

        $towns = [
            '大島町',
            '日の出町',
            '奥多摩町',
            '瑞穂町',
            '八丈町'
        ];

        $villages = [
            '青ヶ島村',
            '利島村',
            '御蔵島村',
            '小笠原村',
            '新島村',
            '三宅村',
            '神津島村',
            '檜原村'
        ];

        $address2List = [
            '千代田区',
            '中央区',
            '港区',
            '新宿区',
            '文京区',
            '台東区',
            '墨田区',
            '江東区',
            '品川区',
            '目黒区',
            '大田区',
            '世田谷区',
            '渋谷区',
            '中野区',
            '杉並区',
            '豊島区',
            '北区',
            '荒川区',
            '板橋区',
            '練馬区',
            '足立区',
            '葛飾区',
            '江戸川区',
            '八王子市',
            '立川市',
            '武蔵野市',
            '三鷹市',
            '青梅市',
            '府中市',
            '昭島市',
            '調布市',
            '町田市',
            '小金井市',
            '小平市',
            '日野市',
            '東村山市',
            '国分寺市',
            '国立市',
            '福生市',
            '狛江市',
            '東大和市',
            '清瀬市',
            '東久留米市',
            '武蔵村山市',
            '多摩市',
            '稲城市',
            '羽村市',
            'あきる野市',
            '西東京市',
            '瑞穂町',
            '日の出町',
            '檜原村',
            '奥多摩町',
            '大島町',
            '利島村',
            '新島村',
            '神津島村',
            '三宅村',
            '御蔵島村',
            '八丈町',
            '青ヶ島村',
            '小笠原村'
        ];
        

        return view('jigyosho::index', compact([
            'districts',
            'cities',
            'towns',
            'villages',
            'address2List',
        ]));
    }
    public function map_search(Request $request)  
    {
        $param = request()->all();        
        $data = $this->mapService->getMapData($param);
        if (!is_array($data)) {
            return response()->json(['error' => 'Invalid data'], 404);
        }
        $result = $this->mapService->getPopupData($data['search_category'], $data['data']);

        return view('jigyosho::map_search', [
            'address_1' => "東京都",
            'address_2' => $data['address_2'],
            'address_3' => $data['address_3'],
            'address_2_onMap' => $data['address_2_onMap'],
            'address_3_onMap' => $data['address_3_onMap'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'dist' => $data['dist'],
            'search_category' => $data['search_category'],
            'icon_lat' => $result['icon_lat'],
            'icon_lng' => $result['icon_lng'],
            'icon_pop_cont' => $result['icon_pop_cont'],
            'iconClass' => $data['iconClass'],
        ]);
    }
}