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
//后台商品管理
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	
	Route::get('/goods/picture/{id}','GoodsController@picture');
	Route::get('/goods/up/{id}','GoodsController@up');
	Route::get('/goods/down/{id}','GoodsController@down');
	Route::post('/goods/addpic','GoodsController@addpic');

	Route::resource('/goods','GoodsController');
	
});