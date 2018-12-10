<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;
use Carbon;

class PestController extends Controller
{
    public $areaData, $categoryList;
    public $catalog = 'pestcatalog';
    /* 取得害蟲目錄 */
    public function GetCategoryList()
    {
        $areaData = $this->areaData = DB::table('pestlist');
        $categoryList = $this->categoryList = DB::table('pestorder');

        /* 子瑩版本 */
        // $type = 'pest';
        // $Data = getHelper::GetCategoryList($areaData, $categoryList, $type);
        // return view($catalog, compact('Data'));

        /* 文祥版本 */
        $type = 'pest';
        $Data = getHelper::GetCategoryList($areaData, $categoryList, $type);
        $categoryList = $Data[0];
        $areaData = $Data[1];
        // 資料重編碼
        $categoryList = json_decode($categoryList);
        $areaData = json_decode($areaData);

        // dd($categoryList);
        // dd($areaData);
        return view('site/pestcatalog', compact('categoryList', 'areaData'));
    }

    /* 取得害蟲清單，由前端進行資料篩選 */
    public function GetPestCategoryData()
    {
        $areaData = DB::table('pestlist');
        $areaData = $areaData->get();
        // dd($areaData);
        return $areaData;
    }

    /* 取得害蟲清單，並且由 Back-End 進行資料篩選 */
    public function GetPestCategoryDataBack(Request $request)
    {
        $categoryNum = $request->categoryNum;
        // $categoryNum = "A1001";
        $areaData = DB::table('pestlist')->where('categoryNum', $categoryNum);
        $areaData = $areaData->get();
        // dd($areaData);
        return $areaData;
    }

    /* 取得個別害蟲資料 */
    public $detailed, $orderdata1, $orderdata2, $page;
    public function GetPestData($name)
    {
        $num = DB::table('arealist')->where('name', $name)->value('num');
        $detailed = $this->detailed = DB::table('pestlist');
        $orderdata1 = $this->oderdata1 = DB::table('pestalias');
        $orderdata2 = $this->oderdata2 = DB::table('solutionlist');

        $pestData = getHelper::Detailed($num, $detailed);
        $alias = getHelper::pestorder($num, $orderdata1)->pluck('pestAlias');
        $solutionDatas = getHelper::pestorder($num, $orderdata2);
        $infectRelation = DB::table('relationship')->select('plantNum', 'plantName')->where('num',$num)->get();
        dd($infectRelation);
        // 資料重編碼
        $solutionDatas = json_decode($solutionDatas);

        /* 前端測試用 */
        // /* 資料說明：指定害蟲的詳細資料 */
        // $fakedata = [
        //     'num' => 'A002',
        //     'name' => '蚜蟲',
        //     'scientificName' => 'Aphidoidea',
        //     'category' => '蚜蟲目',
        //     'secondCategory' => '蚜蟲科',
        //     'habit' => 'somedate',
        //     'img' => 'Link:somewhere'
        // ];
        // $pestData = convertArray2Object($fakedata);

        // /* 資料說明：害蟲別名 */
        // $alias = ['芽', '蟲', '別', '名'];

        // /* 資料說明：指定害蟲的解決方案，可能有多個 */
        // $fakedata2 = [
        //     [
        //         'solutionType' => '農業防治',
        //         'solution' => '消滅越冬蟲源，清除附近雜草，進行徹底清田。'
        //     ], [
        //         'solutionType' => '農業防治',
        //         'solution' => '消滅越冬蟲源，清除附近雜草，進行徹底清田。'
        //     ]
        // ];
        // $solutionDatas = convertArray2Object($fakedata2);

        /* 資料輸出 */
        dd($infectRelation);
        // dd($pestData, $alias, $solutionDatas);
        return view('site/pestdetail', compact('pestData', 'alias', 'solutionDatas','infectRelation'));
    }

}
