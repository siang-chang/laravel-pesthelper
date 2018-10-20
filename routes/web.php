<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//--------------------------------------------------------------------------
// support function
//--------------------------------------------------------------------------
// [change type] this function can change array to an object.
function convertArray2Object($defs) {
    $innerfunc = function ($a) use ( &$innerfunc ) {
       return (is_array($a)) ? (object) array_map($innerfunc, $a) : $a;
    };
    return (object) array_map($innerfunc, $defs);
}
/*
|---------------------------------------------------------------------------
| 前端區域
|---------------------------------------------------------------------------
 */
// Route::get('/chang', function () {
//     return view('ChangTest');
// });
Route::get('/chang', function () {
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
    return view('ChangTest', ['keyWordList' => $keyWordList]);
    // return view('ChangTest', ['keyWordList' => $fakedata]);
});
/*
|---------------------------------------------------------------------------
| 後端區域
|---------------------------------------------------------------------------
 */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

#導向搜尋頁面
Route::get('/index', function () {
    return view('index');
});
#導向害蟲目錄
Route::get('/pestcatalog', function () {
    return view('pestcatalog');
});
#導向植株目錄
Route::get('/plantcatalog', function () {
    return view('plantcatalog');
});

#抓取關鍵字
//Route::post('/search','SearchController@KeywordCount');
//Auth::routes();
#搜尋
Route::post('/search', 'SearchController@Search');
Auth::routes();
#顯示搜尋結果
Route::get('/searchResults', function () {
    return view('searchResults');
});
Auth::routes();
#顯示熱門關鍵字
Route::get('/index', 'SearchController@GetKeywordList');
#顯示害蟲清單
Route::get('/pestcatalog', 'catalogController@pestDataList');
#顯示植株清單
Route::get('/plantcatalog', 'catalogController@plantDataList');
Auth::routes();

#害蟲個別頁面
Route::get('/pestDetailed/{id}', 'pestController@pestDetailed');

//Route::get('successCase/{Case_ID}','FormController@successCase');

Route::get('tank', 'tankController@go');
