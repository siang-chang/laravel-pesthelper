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
function convertArray2Object($defs)
{
    $innerfunc = function ($a) use (&$innerfunc) {
        return (is_array($a)) ? (object)array_map($innerfunc, $a) : $a;
    };
    return (object)array_map($innerfunc, $defs);
}
/*
//---------------------------------------------------------------------------
// 前端區域
//---------------------------------------------------------------------------
 */
Route::get('/_index', 'SearchController@GetKeywordList');
// Route::get('/_index', function () {
//     $fakedata = [
//         [
//             'keyWord' => '蚜蟲蟲',
//             'keyWordCount' => 1000
//         ], [
//             'keyWord' => '玉米子',
//             'keyWordCount' => 200
//         ], [
//             'keyWord' => '三葉蟲',
//             'keyWordCount' => 100
//         ], [
//             'keyWord' => '橡皮蟲',
//             'keyWordCount' => 2
//         ], [
//             'keyWord' => '鳳梨王',
//             'keyWordCount' => 1
//         ]
//     ];
//     $keyWordList = convertArray2Object($fakedata);
//     return view('site/index', ['keyWordList' => $keyWordList]);
// });
#搜尋
Route::get('/search', 'SearchController@Search');
#抓取關鍵字
// Route::get('/search','SearchController@KeywordCount');
// Auth::routes();

Route::get('/_pestcatalog', function () {
    $fakedata = [
        [
            // 資料說明：害蟲的目別清單
            'categoryNum' => 'A002',
            'categoryName' => '半目',
        ], [
            'categoryNum' => 'A003',
            'categoryName' => '半翅目',
        ], [
            'categoryNum' => 'A004',
            'categoryName' => '翅目',
        ], [
            'categoryNum' => 'A005',
            'categoryName' => '半翅',
        ]
    ];
    $categoryList = convertArray2Object($fakedata);
    return view('site/pestcatalog', ['categoryList' => $categoryList]);
});
Route::post('/_pestcatalog/{categoryNum}', 'testController@ShowCatalog');
/*
//---------------------------------------------------------------------------
// 後端區域
//---------------------------------------------------------------------------
 */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');


#導向害蟲目錄
Route::get('/pestcatalog', function () {
    return view('pestcatalog');
});
#導向植株目錄
Route::get('/plantcatalog', function () {
    return view('plantcatalog');
});
#導向圖片上傳
Route::get('/imageUpload', function () {
    return view('imageUpload');
});



Auth::routes();
#顯示搜尋結果
Route::get('/searchResults', function () {
    return view('searchResults');
});
Auth::routes();
#顯示熱門關鍵字
#顯示害蟲清單
Route::get('/pestcatalog', 'PestController@GetCategoryList');


#顯示植株清單
Route::get('/plantcatalog', 'PlantController@GetCategoryList');

#害蟲個別頁面
Route::get('/pestDetailed/{num}', 'PestController@Detailed');
#植株個別頁面
Route::get('/plantDetailed/{num}', 'PlantController@Detailed');

// 圖片上傳
Route::get('imageupload', 'PestController@imageUpload')->name('image.upload');
Route::post('imageupload', 'PestController@imageUploadPost')->name('image.upload.post');
