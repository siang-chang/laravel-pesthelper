<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function index()
    {
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
    // 刪除資料
    public function ShowCatalog($categoryNum)
    {
        // $fakedata = [
        //     [
        //         // 資料說明：害蟲的目別清單
        //         'categoryNum' => 'A002',
        //         'categoryName' => '半目',
        //     ], [
        //         'categoryNum' => 'A003',
        //         'categoryName' => '半翅目',
        //     ], [
        //         'categoryNum' => 'A004',
        //         'categoryName' => '翅目',
        //     ], [
        //         'categoryNum' => 'A005',
        //         'categoryName' => '半翅',
        //     ]
        // ];
        // $categoryList = convertArray2Object($fakedata);
        // return view('site/pestcatalog', ['categoryList' => $categoryList]);
        // return redirect('_pestcatalog', $categoryNum);
        return redirect()->route('_pestcatalog', $categoryNum);
    }

    //
    public function convertArray2Object($defs)
    {
        $innerfunc = function ($a) use (&$innerfunc) {
            return (is_array($a)) ? (object)array_map($innerfunc, $a) : $a;
        };
        return (object)array_map($innerfunc, $defs);
    }
}
