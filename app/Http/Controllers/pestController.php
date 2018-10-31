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

    public $detailed, $orderdata, $page;
    /* 害蟲資料應分為 pestData 及 solutionDatas , 請子瑩之後修正父類別的查詢方式 */
    public function Detailed($num)
    {
        $page = $this->page = 'pestDetailed';
        $detailed = $this->detailed = DB::table('pestlist');
        $orderdata = $this->oderdata = DB::table('solutionlist')->where('pestNum', $num);
        $Data = getHelper::Detailed($num, $detailed, $orderdata);
        return view($page, compact('Data'));
    }
    // 前端測試用
    public function TestDetailed($num)
    {
        $fakedata = [
            // 資料說明：指定害蟲的詳細資料
            'num' => 'A002',
            'name' => '蚜蟲',
            'scientificName' => 'Aphidoidea',
            'category' => '蚜蟲目',
            'secondCategory' => '蚜蟲科',
            'habit' => 'somedate',
            'img' => 'Link:somewhere'
        ];
        $pestData = convertArray2Object($fakedata);

        // 資料說明：害蟲別名
        $alias = ['芽', '蟲', '別', '名'];

        $fakedata2 = [
            [
            // 資料說明：指定害蟲的解決方案，可能有多個
                'solutionType' => '農業防治',
                'solution' => '消滅越冬蟲源，清除附近雜草，進行徹底清田。'
            ], [
                'solutionType' => '農業防治',
                'solution' => '消滅越冬蟲源，清除附近雜草，進行徹底清田。'
            ]
        ];
        $solutionDatas = convertArray2Object($fakedata2);

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
}
