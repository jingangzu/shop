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


//后台商品管理
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	
	Route::get('/goods/picture/{id}','GoodsController@picture');
	Route::get('/goods/up/{id}','GoodsController@up');
	Route::get('/goods/down/{id}','GoodsController@down');
	Route::post('/goods/addpic','GoodsController@addpic');

	Route::resource('/goods','GoodsController');
	
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


// 前台主页
Route::get('/index/index','Index\IndexController@index');

// 前台个人中心
Route::get('/index/user/personage','Index\User\PersonageController@index');

//账户信息(个人资料)
Route::get('/index/user/account','Index\User\PersonageController@account');
Route::get('/index/user/redact','Index\User\PersonageController@redact');
Route::post('/index/user/doredact','Index\User\PersonageController@doredact');

