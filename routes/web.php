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
Route::get('/code/captcha{tmp}','Admin\LoginController@captcha');
Route::post('admin/dologin','Admin\LoginController@dologin');



// 前台//登陆
Route::get('index/login','Index\LoginController@login');
Route::get('index/yzm','Index\LoginController@yzm');
Route::post('index/dologin','Index\LoginController@dologin');

// 注册控制器
Route::get('/index/user/register','Index\User\RegisterController@register');
Route::get('/index/user/yzm','Index\User\RegisterController@yzm');
Route::post('/index/user/doregister','Index\User\RegisterController@doregister');

//重置密码
Route::get('/index/login/resetpw','Index\LoginController@resetpw');





