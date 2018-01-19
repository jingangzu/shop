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

Route::get('/', function () {
    return view('welcome');
});
//资源路由
Route::resource('/good','Home\GoodController');

//幻灯广告
Route::get('/admin/show/index','Admin\ShowController@index');
// Route::get('/admin/show/add','Admin\ShowController@add');
Route::post('/admin/show/insert','Admin\ShowController@insert');
Route::get('/admin/show/edit/{id}','Admin\ShowController@edit');
Route::post('/admin/show/update','Admin\ShowController@update');
Route::get('/admin/show/delete/{id}','Admin\ShowController@delete');

//修改排序的路由
Route::post('/admin/show/changeorder','Admin\ShowController@changeOrder');

//商品页
// Route::get('/admin/index','Admin\index');
Route::get('/admin/goods/index','Admin\GoodsController@index');
Route::get('/admin/goods/add','Admin\GoodsController@add');
Route::post('/admin/goods/insert','Admin\GoodsController@insert');
Route::get('/admin/goods/edit/{id}','Admin\GoodsController@edit');
Route::post('/admin/goods/update','Admin\GoodsController@update');
Route::get('/admin/goods/delete/{id}','Admin\GoodsController@delete');