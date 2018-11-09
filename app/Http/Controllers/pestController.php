<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;

class PestController extends Controller
{
    public $areaData, $categoryList, $catalog;
    public function GetCategoryList()
    {
        $areaData = $this->areaData = DB::table('pestlist');
        $categoryList = $this->categoryList = DB::table('pestorder');
        $catalog = $this->catalog = 'pestcatalog';
        $Data = getHelper::GetCategoryList($areaData, $categoryList);
        return view($catalog, compact('Data'));
    }

    /* 害蟲資料應分為 pestData 及 solutionDatas , 請子瑩之後修正父類別的查詢方式 */
    public $detailed, $orderdata1, $orderdata2, $page;
    public function Detailed($num)
    {
        $detailed = $this->detailed = DB::table('pestlist');
        $orderdata1 = $this->oderdata1 = DB::table('pestalias');
        $orderdata2 = $this->oderdata2 = DB::table('solutionlist');
        $pestData = getHelper::Detailed($num, $detailed);
        $alias = getHelper::pestorder($num, $orderdata1)->pluck('pestAlias');
        $solutionDatas = getHelper::pestorder($num, $orderdata2);
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
        // dd($pestData, $alias, $solutionDatas);
        return view('site/pestdetail', compact('pestData', 'alias', 'solutionDatas'));
    }

    public function imageUpload()
    {
        return view('imageUpload');
    }

    public function imageUploadPost()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('pestimg'), $imageName);
        return back()
            ->with('image', $imageName);
    }

    // 前端測試
    /* 害蟲辨識 */
    public function recognition()
    {
        request()->validate([
            'userImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $userImgs = time() . '.' . request()->userImg->getClientOriginalExtension();
        request()->userImg->move(public_path('pestimg'), $userImgs);
        return view('site/recognitionfail', compact('userImgs'));
    }
}
