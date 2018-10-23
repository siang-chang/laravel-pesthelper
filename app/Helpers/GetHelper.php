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

    public static function GetCategoryList($areaData, $categoryList)
    {
        $datas = $areaData->get();
        $sorts = $categoryList->orderBy('count', 'DESC')->get();
        $Data = array($sorts, $datas);
        return $Data;

    }

    public static function Detailed($num, $detailed, $orderdata)
    {
        $datas = $detailed->where('num', $num)->get();
        $oder = $orderdata->get();
        $Data = array($datas, $oder);
        return $Data;
    }
}