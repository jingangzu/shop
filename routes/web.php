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
Route::get('/admin/user/test','Admin\UsersController@test');
Route::get('/admin/user/address','Admin\UsersController@address');

Route::resource('/admin/users','Admin\UsersController');
//    用户授权页面
Route::get('/admin/user/auth/{id}','Admin\UsersController@auth');
//    添加用户授权逻辑
    Route::post('/admin/user/doauth','Admin\UsersController@doauth');


//角色相关的路由
 Route::resource('/admin/role','Admin\RoleController');

//权限相关的路由
   Route::resource('/admin/permission','Admin\PermissionController');
//  用户授权页面
    Route::get('/admin/role/auth/{id}','Admin\RoleController@auth');
//    添加用户授权逻辑
    Route::post('/admin/role/doauth','Admin\RoleController@doauth');
    Route::post('/admin/role/doauth','Admin\RoleController@doauth');




