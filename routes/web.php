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


Route::get('admin/index','Admin\indexController@index');

Route::get('admin/cate/add','Admin\cateController@add');
Route::get('admin/cate/edit/{id}','Admin\cateController@edit');
Route::delete('admin/cate/del/{id}','Admin\cateController@del');
Route::put('admin/cate/update/{id}','Admin\cateController@update');
Route::post('admin/cate/changeOrder/{id}','Admin\cateController@changeOrder');
Route::post('admin/config/changeOrder/{id}','Admin\ConfigController@changeOrder');
Route::post('admin/cate','Admin\cateController@store');




Route::get('admin/product','Admin\cateController@product');
Route::get('admin/addproduct','Admin\cateController@addproduct');

Route::get('admin/cate/list','Admin\cateController@index');

//网站配置模块
Route::resource('admin/config','Admin\ConfigController');
Route::post('admin/config/changeContent','Admin\ConfigController@changeContent');