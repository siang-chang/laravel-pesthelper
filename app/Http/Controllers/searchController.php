<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    # 關鍵字搜尋
    public function Search(Request $request)
    {
        $searchType = $request->searchType;
        $keyWord = $request->keyWord;
        // 呼叫關鍵字計數功能(KeywordCount function)
        SearchController::KeywordCount($keyWord);
        // 判斷 SearchType
        if ($searchType == "植株") {
            $datas = DB::table('plantlist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
            $searchResults = DB::table('plantlist')->whereIn('num', $datas)->get();
            return view('site/search', compact('searchResults', 'searchType', 'keyWord'));
        }
        if ($searchType == "害蟲") {
            $datas = DB::table('pestlist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
            $searchResults = DB::table('pestlist')->whereIn('num', $datas)->get();
            return view('site/search', compact('searchResults', 'searchType', 'keyWord'));
        } else {
            $datas = DB::table('arealist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
            $searchResults = DB::table('arealist')->whereIn('num', $datas)->get();
            return view('site/search', compact('searchResults', 'searchType', 'keyWord'));
        }

        /* 前端假資料 */
        // $fakedata = [
        //     [
        //         'type' => 'pest',
        //         'num' => 'A001',
        //         'name' => '蚜蟲',
        //         'scientificName' => 'Aphidoidea',
        //         'img' => 'Link:somewhere'

        //     ], [
        //         'type' => 'plant',
        //         'num' => 'B002',
        //         'name' => '菜菜2',
        //         'scientificName' => 'Aphidoidea',
        //         'img' => 'Link:somewhere'
        //     ], [
        //         'type' => 'pest',
        //         'num' => 'A003',
        //         'name' => '蚜蟲3',
        //         'scientificName' => 'Aphidoidea',
        //         'img' => 'Link:somewhere'
        //     ], [
        //         'type' => 'pest',
        //         'num' => 'A005',
        //         'name' => '蚜蟲5',
        //         'scientificName' => 'Aphidoidea',
        //         'img' => 'Link:somewhere'
        //     ]
        // ];
        // $searchResults = convertArray2Object($fakedata);
        // $searchType = "全部搜尋";
        // $keyWord = "玉米";
        // return view('site/search', compact('searchResults', 'searchType', 'keyWord'));
    }
    # 關鍵字計數
    protected static function KeywordCount($keyWord)
    {
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
    # 取得熱門關鍵字
    public function GetKeywordList()
    {
        /* 前端已合併 */
        $keyWordList = DB::table('searchrecord')->orderBy('keyWordCount', 'desc')->take(5)->get();
        return view('site/index', ['keyWordList' => $keyWordList]);
    }
}
