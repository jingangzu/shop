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



//前台订单

//下订单
Route::get('home/ordersub/{gid}/{aid}/{price}/{num}', 'Home\OrdersubController@index');	
//Route::post('home/ordersub', 'Home\OrdersubController@end');	
	
//生成订单
Route::post('home/ordersub', 'Home\OrdersubController@create');			
//订单详情
//Route::get('home/ordersinfo/{code}', 'Home\OrdersinfoController@index');			
//取消订单
//Route::get('home/orderre', 'Home\UserorderController@create'); 		
//确认收货
//Route::get('home/ordersu', 'Home\UserorderController@store'); 		



//首页

Route::get('/','Home\IndexController@index');

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
Route::get('/index/user/nextresetpw/{email}','Index\User\RegisterController@nextresetpw');
Route::post('/index/user/donextresetpw','Index\User\RegisterController@donextresetpw');

//前台商品列表
Route::get('home/goods/cate/{cid}','Home\GoodsController@list');
//详情
Route::get('home/goods/{id}','Home\GoodsController@show');


//加入购物车
Route::post('/home/addcart','Home\ShopcarController@addCart');
//购物车列表
Route::get('/home/shopcar','Home\ShopcarController@cart');






//后台
//首页

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





//后台商品管理
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	
	Route::get('/goods/picture/{id}','GoodsController@picture');
	Route::get('/goods/up/{id}','GoodsController@up');
	Route::get('/goods/down/{id}','GoodsController@down');
	Route::post('/goods/addpic','GoodsController@addpic');

	Route::resource('/goods','GoodsController');
	
});


//后台订单管理
Route::get('admin/orders/up/{id}','Admin\OrdersController@up');
Route::get('admin/orders/down/{id}','Admin\OrdersController@down');
Route::resource('admin/orders','Admin\OrdersController');


// 后台登录
Route::get('admin/login','Admin\LoginController@login');
Route::get('admin/yzm','Admin\LoginController@yzm');
Route::post('admin/dologin','Admin\LoginController@dologin');


//幻灯广告
Route::get('/admin/show/index','Admin\ShowController@index');
// Route::get('/admin/show/add','Admin\ShowController@add');
Route::post('/admin/show/insert','Admin\ShowController@insert');
Route::get('/admin/show/edit/{id}','Admin\ShowController@edit');
Route::post('/admin/show/update','Admin\ShowController@update');
Route::get('/admin/show/delete/{id}','Admin\ShowController@delete');

//修改排序的路由
Route::post('/admin/show/changeorder','Admin\ShowController@changeOrder');

//友情链接
Route::get('admin/frindlink/show/{id}','Admin\FriendlinkController@up');
Route::get('admin/frindlink/hide/{id}','Admin\FriendlinkController@down');
Route::resource('/admin/friendlink','Admin\FriendlinkController');

//后台首页
Route::get('admin/index','Admin\indexController@index');

//分类
Route::get('admin/cate/add','Admin\cateController@add');
Route::get('admin/cate/edit/{id}','Admin\cateController@edit');
Route::delete('admin/cate/del/{id}','Admin\cateController@del');
Route::put('admin/cate/update/{id}','Admin\cateController@update');
Route::post('admin/cate/changeOrder/{id}','Admin\cateController@changeOrder');
Route::post('admin/config/changeOrder/{id}','Admin\ConfigController@changeOrder');
Route::post('admin/cate','Admin\cateController@store');


Route::get('admin/cate/list','Admin\cateController@index');

//网站配置模块
Route::resource('admin/config','Admin\ConfigController');
Route::post('admin/config/changeContent','Admin\ConfigController@changeContent');


//推荐位
Route::get('/admin/recommend/index','Admin\RecommendController@index');
// Route::get('/admin/show/add','Admin\ShowController@add');
Route::post('/admin/recommend/insert','Admin\RecommendController@insert');
Route::get('/admin/recommend/edit/{id}','Admin\RecommendController@edit');
Route::post('/admin/recommend/update','Admin\RecommendController@update');
Route::get('/admin/recommend/delete/{id}','Admin\RecommendController@delete');

//修改排序的路由
Route::post('/admin/recommend/changeorder','Admin\RecommendController@changeOrder');


//广告位
Route::get('/admin/advertisement/index','Admin\AdvertisementController@index');
// Route::get('/admin/show/add','Admin\ShowController@add');
Route::post('/admin/advertisement/insert','Admin\AdvertisementController@insert');
Route::get('/admin/advertisement/edit/{id}','Admin\AdvertisementController@edit');
Route::post('/admin/advertisement/update','Admin\AdvertisementController@update');
Route::get('/admin/advertisement/delete/{id}','Admin\AdvertisementController@delete');

//修改排序的路由
Route::post('/admin/advertisement/changeorder','Admin\AdvertisementController@changeOrder');

Route::get('admin/cate/list','Admin\cateController@index');


//网站配置模块
Route::resource('admin/config','Admin\ConfigController');
Route::post('admin/config/changeContent','Admin\ConfigController@changeContent');




// 前台个人中心 
Route::get('/index/user/personage','Index\User\PersonageController@index');
  
//账户信息(个人资料)
Route::get('/index/user/account','Index\User\PersonageController@account');
Route::get('/index/user/redact','Index\User\PersonageController@redact');
Route::post('/index/user/doredact','Index\User\PersonageController@doredact');
 //地址
Route::get('/index/address/index','Index\Address\AddressController@index');
Route::get('/index/address/insert','Index\Address\AddressController@insert');
Route::get('/index/address/add','Index\Address\AddressController@add');
Route::get('/index/address/edit/{id}','Index\Address\AddressController@edit');
Route::post('/index/address/update','Index\Address\AddressController@update');
Route::get('/index/address/delete/{id}','Index\Address\AddressController@delete');