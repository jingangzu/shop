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
// 邮箱激活
Route::get('index/user/active/{email}','Index\User\RegisterController@active');
// Route::get('/index/user/pwactive','Index\LoginController@pwactive');

//重置密码
Route::get('/index/user/resetpw','Index\User\RegisterController@resetpw');
Route::post('/index/user/doresetpw','Index\User\RegisterController@doresetpw');
// Route::get('/index/user/remails/{email}','Index\User\RegisterController@remails');
Route::get('/index/user/nextresetpw/{email}','Index\User\RegisterController@nextresetpw');
Route::post('/index/user/donextresetpw','Index\User\RegisterController@donextresetpw');






