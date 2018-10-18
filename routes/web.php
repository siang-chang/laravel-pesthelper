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
/*
|---------------------------------------------------------------------------
| 前端區域
|---------------------------------------------------------------------------
*/
Route::get('/chang', function () {
    return view('ChangTest');
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
//Route::post('/search','searchController@keyWord');
//Auth::routes();
#搜尋
Route::post('/search','searchController@search');
Auth::routes();
#顯示搜尋結果
Route::get('/searchResults', function () {
    return view('searchResults');
});
Auth::routes();
#顯示害蟲清單
Route::get('/pestcatalog', 'catalogController@pestDataList');
#顯示植株清單
Route::get('/plantcatalog', 'catalogController@plantDataList');
Auth::routes();

#害蟲個別頁面
Route::get('/pestDetailed/{id}', 'pestController@pestDetailed');

//Route::get('successCase/{Case_ID}','FormController@successCase');

Route::get('tank','tankController@go');