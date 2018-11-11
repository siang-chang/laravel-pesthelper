<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function index()
    {
        // 頁面載入的時候傳入的值
        $fakedata = [
            [
                // 資料說明：害蟲的目別清單
                'categoryNum' => 'A002',
                'categoryName' => '半目',
            ], [
                'categoryNum' => 'A003',
                'categoryName' => '半翅目',
            ], [
                'categoryNum' => 'A004',
                'categoryName' => '翅目',
            ], [
                'categoryNum' => 'A005',
                'categoryName' => '半翅',
            ]
        ];
        $categoryList = convertArray2Object($fakedata);
        return view('site/pestcatalog', ['categoryList' => $categoryList]);
    }
    public function ShowCatalog($categoryNum)
    {
        $fakedatas = [
            [
                // 資料說明：害蟲的目別清單
                'categoryNum' => 'A002',
                'categoryName' => '半目'
            ], [
                'categoryNum' => 'A003',
                'categoryName' => '半翅'
            ], [
                'categoryNum' => 'A004',
                'categoryName' => '翅'
            ], [
                'categoryNum' => 'A005',
                'categoryName' => '半'
            ]
        ];
        $categoryList = convertArray2Object($fakedatas);
        $fakedata = [
            [
                // 資料說明：指定類別的害蟲資料細項
                'num' => 'A002',
                'name' => '蚜蟲',
                'scientificName' => 'Aphidoidea',
                'img' => 'Link:somewhere'
            ], [
                'num' => 'A100',
                'name' => 'someplant',
                'scientificName' => 'someplant',
                'img' => 'Link:somewhere'
            ]
        ];
        $pestCategoryData = convertArray2Object($fakedata);
        // $pestCategoryData = $categoryNum;
        // return redirect()->back()->with('pestcategoryData' ,$pestCategoryData);
        return view('site/pestcatalog', compact('categoryList', 'pestCategoryData'));
    }
}
