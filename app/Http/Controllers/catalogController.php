<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class catalogController extends Controller
{

    public function pestDataList()
    {
        $datas = DB::table('pestdata')->get();
        return view('pestcatalog')->with('datas',$datas);
    }

    public function plantDataList()
    {
        $datas = DB::table('plantdata')->get();
        return view('plantcatalog')->with('datas',$datas);
    }
}
