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
            // 判斷是否為空值，否就呼叫關鍵字計數功能(KeywordCount function)
            if ((empty($keyWord)) == false) {
                SearchController::KeywordCount($keyWord);
            }
            // 判斷 SearchType
            if ($searchType == "僅查植株") {
                $datas1 = DB::table('plantlist')->where('name', 'like', '%' . $keyWord . '%')->pluck('num');
                $datas2 = DB::table('plantlist')->where('alias', 'like', '%' . $keyWord . '%')->pluck('num');
                $datas3 = DB::table('plantlist')->where('scientificName', 'like', '%' . $keyWord . '%')->pluck('num');

                $datas = array($datas1, $datas2, $datas3);
                $searchResults = DB::table('plantlist')->whereIn('num', array_flatten($datas))->get();
            } elseif ($searchType == "僅查害蟲") {
                $datas1 = DB::table('pestlist')->where('name', 'like', '%' . $keyWord . '%')->pluck('num');
                $datas2 = DB::table('pestlist')->where('alias', 'like', '%' . $keyWord . '%')->pluck('num');
                $datas3 = DB::table('pestlist')->where('scientificName', 'like', '%' . $keyWord . '%')->pluck('num');

                $datas = array($datas1, $datas2, $datas3);
                $searchResults = DB::table('pestlist')->whereIn('num', array_flatten($datas))->get();
            } else {

                $datas1 = DB::table('arealist')->where('name', 'like', '%' . $keyWord . '%')->pluck('num');
                $datas2 = DB::table('arealist')->where('alias', 'like', '%' . $keyWord . '%')->pluck('num');
                $datas3 = DB::table('arealist')->where('scientificName', 'like', '%' . $keyWord . '%')->pluck('num');
                $datas = array($datas1, $datas2, $datas3);
                $datas4 = DB::table('infectrelation')->whereIn('plantNum', array_flatten($datas))->pluck('pestNum');
                $datas5 = DB::table('infectrelation')->whereIn('pestNum', array_flatten($datas))->pluck('plantNum');
                $datas = array($datas1, $datas2, $datas3, $datas4, $datas5);

                $searchResults = DB::table('arealist')->whereIn('num', array_flatten($datas))->get();
            }
            /* 資料重編碼 */
            $searchResults = json_decode($searchResults);
        } catch (\Exception $e) {
            /* 如果無法正常連線，則使用假資料 */
            $fakedata = [
                [
                    "type" => "pest",
                    "num" => "A001",
                    "name" => " 小綠葉蟬",
                    "scientificName" => "Empoasca Flavescens",
                    "categoryNum" => "A1001",
                    "habit" => "小綠葉蟬一年發生14個世代。卵期平均11.4天，孵化後經5次脫皮而羽化為成蟲，若蟲期平均31.1天，成蟲期雌蟲平均為35.4天，雄蟲平均為25.9天。一隻雌蟲一生最多可產卵粒150粒，平均為30粒。",
                    "img" => "Link:somewhere"
                ],
                [
                    "type" => "pest",
                    "num" => "A002",
                    "name" => "小翅椿象",
                    "scientificName" => "Cavelerius Saccharivorus",
                    "categoryNum" => "A1001",
                    "habit" => "",
                    "img" => "Link:somewhere"
                ],
                [
                    "type" => "pest",
                    "num" => "A003",
                    "name" => "吹綿介殼蟲",
                    "scientificName" => "Icerya purchasi Maskell",
                    "categoryNum" => "A1001",
                    "habit" => "",
                    "img" => "Link:somewhere"
                ],
                [
                    "type" => "pest",
                    "num" => "A026",
                    "name" => "四紋豆象",
                    "scientificName" => "Callosobruchus  maculatus",
                    "categoryNum" => "A1003",
                    "habit" => "",
                    "img" => "Link:somewhere"
                ],
                [
                    "type" => "pest",
                    "num" => "A021",
                    "name" => "大蟋蟀",
                    "scientificName" => "Brachytrupes portentosus",
                    "categoryNum" => "A1002",
                    "habit" => "",
                    "img" => "Link:somewhere"
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
                    'keyWord' => '蚜蟲',
                    'keyWordCount' => 1000
                ], [
                    'keyWord' => '玉米',
                    'keyWordCount' => 200
                ], [
                    'keyWord' => '三葉蟲',
                    'keyWordCount' => 100
                ], [
                    'keyWord' => '橡皮蟲',
                    'keyWordCount' => 2
                ], [
                    'keyWord' => '鳳梨',
                    'keyWordCount' => 1
                ]
            ];
            $keyWordList = convertArray2Object($fakedata);
        }

        /* 回傳 & 顯示資料 */
        return view('site/index', ['keyWordList' => $keyWordList]);
    }
}
