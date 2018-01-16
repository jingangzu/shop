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




// 后台
Route::get('admin/login','Admin\LoginController@login');
Route::get('admin/yzm','Admin\LoginController@yzm');
Route::post('admin/dologin','Admin\LoginController@dologin');



// 前台//登陆
Route::get('index/login','Index\LoginController@login');
Route::get('index/yzm','Index\LoginController@yzm');
Route::post('index/dologin','Index\LoginController@dologin');
// 注册控制器
Route::get('/index/user/register','Index\User\RegisterController@register');



//后台
//首页
Route::get('/admin/index',function(){
	return view('admin.index');
});
//用户管理
Route::resource('/admin/users','Admin\UsersController');

