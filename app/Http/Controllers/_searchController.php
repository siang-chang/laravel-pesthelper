<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class _searchController extends Controller
{
    
    public function keyWord(Request $request)
    {  
        $keyWord = $request->keyword;
        if(DB::table('searchrecord')->where('keyWord',$keyWord)->count()==0)
        {
            $keyWordCount = 1;

            DB::table('searchrecord')->insert([
                'keyWord'=>$keyWord,
                'keyWordCount'=>$keyWordCount,
            ]);
        }
        else
        {
            $keyWordCount = DB::table('searchrecord')->where('keyWord',$keyWord)->value('keyWordCount');
            $keyWordCount++;
            DB::table('searchrecord')->where('keyWord',$keyWord)->update(['keyWordCount'=>$keyWordCount]);
        }

    }

    public function search(Request $request)
    {
        $keyWord = $request->keyword;
        $searchType = $request->searchType;
        if($searchType == "pest")
        {
            $searchResults = DB::table('pestalias')->where('pestAlias','like','%'.$keyWord.'%')->value('pestNum');
            dd($searchResults);
            $datas = DB::table('pestdata')->where('pestNum',$searchResults)->get();
            return view('searchResults',compact('datas','searchType','keyWord'));

        }
        else if($searchType == "plant")
        {
            $searchResults = DB::table('plantalias')->where('plantAlias','like','%'.$keyWord.'%')->value('plantNum');

            $datas = DB::table('plantdata')->where('plantNum',$searchResults)->get();
            return view('searchResults',compact('datas','searchType','keyWord'));
        }
        else
        {
            //搜尋害蟲別名
            $searchResults_pest1 = DB::table('pestalias')->where('pestAlias','like','%'.$keyWord.'%')->value('pestNum');
            //搜尋害蟲與植株的關係
            $searchResults_plant1 = DB::table('infectrelation')->where('pestNum',$searchResults_pest1)->value('plantNum');
            //傳害蟲資料
            $datas_pest1 = DB::table('pestdata')->where('pestNum',$searchResults_pest1)->get();
            //傳有相互關係植株資料
            $datas_plant1 = DB::table('plantdata')->where('plantNum',$searchResults_plant1)->get();

            //搜尋植株別名
            $searchResults_plant2 = DB::table('plantalias')->where('plantAlias','like','%'.$keyWord.'%')->value('plantNum');
            //搜尋害蟲與植株的關係
            $searchResults_pest2 = DB::table('infectrelation')->where('plantNum',$searchResults_plant2)->value('pestNum');
            //傳植株資料
            $datas_plant2 = DB::table('plantdata')->where('plantNum',$searchResults_plant2)->get();
            //傳有相關關係害蟲資料
            $datas_pest2 = DB::table('pestdata')->where('pestNum',$searchResults_pest2)->get();
            

            return view('searchResults',compact('datas_pest1','datas_plant1','datas_plant2','datas_pest2','searchType','keyWord'));


        }

    }
}
