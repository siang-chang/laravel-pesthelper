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

    public $detailed,$orderdata,$page;
    public function Detailed($num)
    {
        $page = $this->page = 'pestDetailed';
        $detailed = $this->detailed = DB::table('pestlist');
        $orderdata = $this->oderdata = DB::table('solutionlist')->where('pestNum', $num);

        $Data = getHelper::Detailed($num,$detailed,$orderdata);

        return view($page, compact('Data'));

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
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('pestimg'), $imageName);
        return back()
            ->with('image', $imageName);
    }
}
