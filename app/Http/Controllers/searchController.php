<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //關鍵字搜尋
    public function Search(Request $request)
    {
        $searchType = $request->searchType;
        $keyWord = $request->keyword;
        if ($searchType == "全部類別") {
            $searchResults = DB::table('arealist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
            $datas = DB::table('arealist')->whereIn('num', $searchResults)->get();
            return view('searchResults', compact('datas', 'searchType', 'keyWord'));
        }
        if ($searchType == "害蟲") {

            $searchResults = DB::table('pestlist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
            $datas = DB::table('pestlist')->whereIn('num', $searchResults)->get();
            return view('searchResults', compact('datas', 'searchType', 'keyWord'));
        } else {
            $searchResults = DB::table('plantlist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
            $datas = DB::table('plantlist')->whereIn('num', $searchResults)->get();
            return view('searchResults', compact('datas', 'searchType', 'keyWord'));
        }
    }

    public function KeywordCount(Request $request)
    {
        $keyWord = $request->keyword;
        if (DB::table('searchrecord')->where('keyWord', $keyWord)->count() == 0) {
            $keyWordCount = 1;

            DB::table('searchrecord')->insert([
                'keyWord' => $keyWord,
                'keyWordCount' => $keyWordCount,
            ]);
        } else {
            $keyWordCount = DB::table('searchrecord')->where('keyWord', $keyWord)->value('keyWordCount');
            $keyWordCount++;
            DB::table('searchrecord')->where('keyWord', $keyWord)->update(['keyWordCount' => $keyWordCount]);
        }
    }

    public function GetKeywordList()
    {
        $keywordList = DB::table('searchrecord')->orderBy('keyWordCount', 'desc')->take(5)->get();
        return view('index', compact('keywordList'));
        
            //資料說明：熱門關鍵字清單，取出前5項'keyword'=>'蚜蟲','searchCount'=>1000],['keyword'=>'三頁蟲','searchCount'=>549


    }
}