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

//前台
//资源路由
Route::resource('/home/good','Home\GoodController');
//后台
//首页
Route::get('/admin/index',function(){
	return view('admin.index');
});
//用户管理
Route::resource('/admin/users','Admin\UsersController');

