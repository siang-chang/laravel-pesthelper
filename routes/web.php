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
# 系統首頁 & 熱門關鍵字
Route::get('/', 'SearchController@GetKeywordList');

# 關鍵字搜尋
Route::get('/search', 'SearchController@Search');

# 害蟲目錄
Route::get('/pestcatalog', function () {
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

# 害蟲目錄 -> 子目錄展開
Route::post('/pestcatalog/{categoryNum}', 'testController@ShowCatalog');

# 植株目錄
Route::get('/plantcatalog', function () {
    $fakedata = [
        [
            // 資料說明：植株的目別清單
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
    return view('site/plantcatalog', ['categoryList' => $categoryList]);
});

#害蟲個別頁面
Route::get('/pestDetailed/{num}', 'PestController@Detailed');
// Route::get('/pestTestDetailed/{num}', 'PestController@TestDetailed');

#植株個別頁面
Route::get('/plantDetailed/{num}', 'PlantController@Detailed');
// Route::get('/plantTestDetailed/{num}', 'PlantController@TestDetailed');

# 害蟲影像辨識
Route::get('/recognition', function () {
    return view('site/recognition');
});
# 害蟲影像辨識 -> 傳送辨識圖片
Route::post('/recognition', 'PestController@recognition');

/*
//---------------------------------------------------------------------------
// 後端區域
//---------------------------------------------------------------------------
 */

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

#導向害蟲目錄
Route::get('/_pestcatalog', function () {
    return view('pestcatalog');
});
#導向植株目錄
Route::get('/_plantcatalog', function () {
    return view('plantcatalog');
});
#導向圖片上傳
Route::get('/imageUpload', function () {
    return view('imageUpload');
});

#顯示搜尋結果
Route::get('/searchResults', function () {
    return view('searchResults');
});

#顯示害蟲清單
Route::get('/_pestcatalog', 'PestController@GetCategoryList');

#顯示植株清單
Route::get('/_plantcatalog', 'PlantController@GetCategoryList');

// 圖片上傳
Route::get('imageupload', 'PestController@imageUpload')->name('image.upload');
Route::post('imageupload', 'PestController@imageUploadPost')->name('image.upload.post');
