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



//前台
//首页

Route::get('/','Home\IndexController@index');
// 前台//登陆
Route::get('index/login','Index\LoginController@login');
Route::get('index/yzm','Index\LoginController@yzm');
Route::post('index/dologin','Index\LoginController@dologin');

// 前台退出
Route::get('/index/user/loginout','Index\LoginController@loginout');
// 注册控制器
Route::get('user/register','User\RegisterController@register');
Route::get('user/yzm','User\RegisterController@yzm');
Route::post('user/doregister','User\RegisterController@doregister');


// 前台路由组中间件
Route::group(['prefix'=>'index','namespace'=>'Index','middleware'=>'index.login'],function(){


	// 邮箱激活
	Route::get('user/active/{email}','User\RegisterController@active');
	// Route::get('/index/user/pwactive','Index\LoginController@pwactive');

	//重置密码
	Route::get('user/resetpw','User\RegisterController@resetpw');
	Route::post('user/doresetpw','User\RegisterController@doresetpw');
	Route::get('user/nextresetpw/{email}','User\RegisterController@nextresetpw');
	Route::post('user/donextresetpw','User\RegisterController@donextresetpw');


});




// 后台登录
Route::get('admin/login','Admin\LoginController@login');
Route::get('admin/yzm','Admin\LoginController@yzm');
Route::post('admin/dologin','Admin\LoginController@dologin');




//后台路由组中间件
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'],function(){

	//后台
	//首页



	// 后台退出
	Route::get('loginout','LoginController@loginout');

	//用户管理
	Route::get('user/test','UsersController@test');
	Route::get('user/address','UsersController@address');

	Route::resource('users','UsersController');
	//    用户授权页面
	Route::get('user/auth/{id}','UsersController@auth');
	//    添加用户授权逻辑
	Route::post('user/doauth','UsersController@doauth');


	//角色相关的路由
	Route::resource('role','RoleController');

	//权限相关的路由
	Route::resource('permission','PermissionController');
	//  用户授权页面
	Route::get('role/auth/{id}','RoleController@auth');
	//    添加用户授权逻辑
	Route::post('role/doauth','RoleController@doauth');
	Route::post('role/doauth','RoleController@doauth');

	// 后台商品管理
	Route::get('/goods/picture/{id}','GoodsController@picture');
	Route::get('/goods/up/{id}','GoodsController@up');
	Route::get('/goods/down/{id}','GoodsController@down');
	Route::post('/goods/addpic','GoodsController@addpic');

	Route::resource('/goods','GoodsController');

	//幻灯广告
	Route::get('show/index','ShowController@index');
	// Route::get('/admin/show/add','Admin\ShowController@add');
	Route::post('show/insert','ShowController@insert');
	Route::get('show/edit/{id}','ShowController@edit');
	Route::post('show/update','ShowController@update');
	Route::get('show/delete/{id}','ShowController@delete');

	//修改排序的路由
	Route::post('show/changeorder','ShowController@changeOrder');

	//友情链接
	Route::get('frindlink/show/{id}','FriendlinkController@up');
	Route::get('frindlink/hide/{id}','FriendlinkController@down');
	Route::resource('friendlink','FriendlinkController');

	//后台首页
	Route::get('index','indexController@index');

	//分类
	Route::get('cate/add','cateController@add');
	Route::get('cate/edit/{id}','cateController@edit');
	Route::delete('cate/del/{id}','cateController@del');
	Route::put('cate/update/{id}','cateController@update');
	Route::post('cate/changeOrder/{id}','cateController@changeOrder');
	Route::post('config/changeOrder/{id}','ConfigController@changeOrder');
	Route::post('cate','cateController@store');


	Route::get('cate/list','cateController@index');

	//网站配置模块
	Route::resource('config','ConfigController');
	Route::post('config/changeContent','ConfigController@changeContent');

});