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
        try {
            /* 判斷是否為空值，否就呼叫關鍵字計數功能(KeywordCount function) */
            if ((empty($keyWord)) == false) {
                SearchController::KeywordCount($keyWord);
            }

            /* 判斷 SearchType */
            if ($searchType == "植株") {
                $datas = DB::table('plantlist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
                $searchResults = DB::table('plantlist')->whereIn('num', $datas)->get();
            } else if ($searchType == "害蟲") {
                $datas = DB::table('pestlist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
                $searchResults = DB::table('pestlist')->whereIn('num', $datas)->get();
            } else {
                $datas = DB::table('arealist')->where('name', 'like', '%' . $keyWord . '%', 'or', 'alias', 'like', '%' . $keyWord . '%')->distinct()->pluck('num');
                $searchResults = DB::table('arealist')->whereIn('num', $datas)->get();
            }

            /* 資料重編碼 */
            $searchResults = json_decode($searchResults);
        } catch (\Exception $e) {
            /* 如果無法正常連線，則使用假資料 */
            $fakedata = [
                [
                    'type' => 'pest',
                    'num' => 'A001',
                    'name' => '蚜蟲',
                    'scientificName' => 'Aphidoidea',
                    'img' => 'Link:somewhere'

                ], [
                    'type' => 'plant',
                    'num' => 'B002',
                    'name' => '菜菜2',
                    'scientificName' => 'Aphidoidea',
                    'img' => 'Link:somewhere'
                ], [
                    'type' => 'pest',
                    'num' => 'A003',
                    'name' => '蚜蟲3',
                    'scientificName' => 'Aphidoidea',
                    'img' => 'Link:somewhere'
                ], [
                    'type' => 'pest',
                    'num' => 'A005',
                    'name' => '蚜蟲5',
                    'scientificName' => 'Aphidoidea',
                    'img' => 'Link:somewhere'
                ]
            ];
            $searchResults = convertArray2Object($fakedata);
        }

        /* 回傳 & 顯示資料 */
        return view('site/search', compact('searchResults', 'searchType', 'keyWord'));
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
        try {
            $keyWordList = DB::table('searchrecord')->orderBy('keyWordCount', 'desc')->take(5)->get();
        } catch (\Exception $e) {
            /* 如果無法正常連線，則使用假資料 */
            $fakedata = [
                [
                    'keyWord' => '蚜蟲蟲',
                    'keyWordCount' => 1000
                ], [
                    'keyWord' => '玉米子',
                    'keyWordCount' => 200
                ], [
                    'keyWord' => '三葉蟲',
                    'keyWordCount' => 100
                ], [
                    'keyWord' => '橡皮蟲',
                    'keyWordCount' => 2
                ], [
                    'keyWord' => '鳳梨王',
                    'keyWordCount' => 1
                ]
            ];
            $keyWordList = convertArray2Object($fakedata);
        }

        /* 回傳 & 顯示資料 */
        return view('site/index', ['keyWordList' => $keyWordList]);
    }
}
