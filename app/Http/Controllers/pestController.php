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

    public $detailed,$orderdata1,$orderdata2,$page;
    public function Detailed($num)
    {
        $page = $this->page = 'pestDetailed';
        $detailed = $this->detailed = DB::table('pestlist');
        $orderdata1 = $this->oderdata1 = DB::table('pestalias');
        $orderdata2 = $this->oderdata2 = DB::table('solutionlist');
        $pestData = getHelper::Detailed($num,$detailed);
        $alias = getHelper::pestorder($num,$orderdata1)->pluck('pestAlias');
        $solutionData = getHelper::pestorder($num,$orderdata2);
        //dd($pestData,$alias,$solutionData);
        return view($page, compact('pestData','alias','solutionData'));

    } 
    ////////////////////////////////////////////////////////
    public function imageUpload()
    {
        return view('imageUpload');
    }
    public function imageUploadPost()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('pestimg'), $imageName);
        return back()
            ->with('image', $imageName);
    }
}
