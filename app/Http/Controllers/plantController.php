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

    public $detailed, $orderdata1,$orderdata2, $page;
    public function Detailed($num)
    {
        $page = $this->page = 'plantDetailed';
        $detailed = $this->detailed = DB::table('plantlist');
        $orderdata1 = $this->oderdata1 = DB::table('plantalias');
        $orderdata2= $this->oderdata2 = DB::table('relationship');

        $plantData = getHelper::Detailed($num, $detailed);
        $alias = getHelper::plantorder($num, $orderdata1)->pluck('plantAlias');
        $infectRelation = getHelper::plantorder($num, $orderdata2)->select('num','name','img')->get();
        return view($page, compact('plantData','alias','infectRelation'));

    }
}