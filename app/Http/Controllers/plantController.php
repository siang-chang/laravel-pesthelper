<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;

class PlantController extends Controller
{
    public $areaData, $categoryList, $catalog;

    public function GetCategoryList()
    {
        $areaData = $this->areaData = DB::table('plantlist');
        $categoryList = $this->categoryList = DB::table('plantfamily');
        $catalog = $this->catalog = 'plantcatalog';
        $Data = getHelper::GetCategoryList($areaData, $categoryList);
        return view($catalog, compact('Data'));
    }

    public $detailed, $orderdata, $page;
    public function Detailed($num)
    {
        $page = $this->page = 'plantDetailed';
        $detailed = $this->detailed = DB::table('plantlist');
        $orderdata = $this->oderdata = DB::table('relationship')->where('plantNum', $num);

        $Data = getHelper::Detailed($num, $detailed, $orderdata);

        return view($page, compact('Data'));

    }
    // 前端測試用
    public function TestDetailed($num)
    {
        $fakedata = [
            // 資料說明：指定植株的詳細資料
            'num' => 'B001',
            'name' => '菊花',
            'scientificName' => 'Chrysanthemum spp',
            'category' => '菊科',
            'secondCategory' => '菊屬',
            'img' => 'Link:somewhere'
        ];
        $plantData = convertArray2Object($fakedata);

        // 資料說明：植株別名
        $alias = ['植', '株', '別', '名'];

        $fakedata2 = [
            [
            // 資料說明：指定植株可能感染的害蟲
                'num' => 'A002',
                'name' => '蚜蟲1',
                'img' => 'Link:somewhere'
            ], [
                'num' => 'A002',
                'name' => '蚜蟲2',
                'img' => 'Link:somewhere'
            ], [
                'num' => 'A002',
                'name' => '蚜蟲3',
                'img' => 'Link:somewhere'
            ], [
                'num' => 'A002',
                'name' => '蚜蟲4',
                'img' => 'Link:somewhere'
            ]
        ];
        $infectRelation = convertArray2Object($fakedata2);

        return view('site/plantdetail', compact('plantData', 'alias', 'infectRelation'));
    }
}
