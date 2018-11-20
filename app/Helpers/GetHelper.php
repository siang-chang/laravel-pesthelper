<?php
namespace App\Helpers;

class GetHelper
{

    function __construct()
    {

    }

    public static function view()
    {

    }

    public static function GetCategoryList($areaData, $categoryList,$type)
    {
        $datas = $areaData->get();
        dd($datas);
        if ($type == 'pest'){
            $sorts = $categoryList->select('orderNum as categoryNum','pestOrder as categoryName','count')->orderBy('count', 'DESC')->get();

        }else {
            $sorts = $categoryList->select('familyNum as categoryNum','plantFamily as categoryName','count')->orderBy('count', 'DESC')->get();
        }
        
        // $sorts = $categoryList->orderBy('count', 'DESC')->get();
        $Data = array($sorts, $datas);
        return $Data;

    }
    public static function Detailed($num, $detailed)
    {
        $datas = $detailed->where('num', $num)->first();
        return $datas;
    }
    public static function pestorder($num, $orderdata)
    {
        $oder = $orderdata->where('pestNum', $num)->get();
        return $oder;
    }
    public static function plantorder($num, $orderdata)
    {
        $oder = $orderdata->where('plantNum', $num);
        return $oder;
    }
}
