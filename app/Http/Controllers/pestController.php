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

    /* 影像辨識模組測試區塊 */
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

    /* 前端測試區塊 */
    /* 害蟲辨識 */
    public function recognition(Request $request)
    {
        // request()->validate([
        //     'userImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $userImgs = time() . '.' . request()->userImg->getClientOriginalExtension();
        // request()->userImg->move(public_path('pestimg'), $userImgs);
        // // return view('site/recognitionfail', compact('userImgs'));
        $base64_image_content = $request->userImg;
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
            $type = $result[2];
            $path = "upload/";
            if (!file_exists($path)) {
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($path, 0700);
            }
            $new_file = $path . time() . ".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))) {
                echo '保存成功：', $new_file;
            } else {
                echo '保存失败';
            }
        }
        return "success";
    }

}
