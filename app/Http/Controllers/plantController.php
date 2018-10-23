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
}