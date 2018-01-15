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


Route::get('admin/login','Admin\LoginController@login');

Route::get('admin/yzm','Admin\LoginController@yzm');

Route::get('/code/captcha{tmp}','Admin\LoginController@captcha');

Route::post('admin/dologin','Admin\LoginController@dologin');




Route::get('index/login','Index\LoginController@login');

Route::get('index/yzm','Index\LoginController@yzm');

Route::get('/code/captcha{tmp}','Index\LoginController@captcha');

Route::post('index/dologin','Index\LoginController@dologin');


