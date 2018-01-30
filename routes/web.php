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

// 注册控制器
Route::get('/index/user/register','Index\User\RegisterController@register');
Route::get('/index/user/yzm','Index\User\RegisterController@yzm');
Route::post('/index/user/doregister','Index\User\RegisterController@doregister');


//前台商品列表
Route::get('/home/goods/cate/{cid}','Home\GoodsController@list');
//详情
Route::get('/home/goods/{id}','Home\GoodsController@show');
Route::post('/home/goods/{id}','Home\GoodsController@seek');

	//重置密码
Route::get('index/user/resetpw','Index\User\RegisterController@resetpw');
Route::post('index/user/doresetpw','\Index\User\RegisterController@doresetpw');
Route::get('index/user/nextresetpw/{email}','Index\User\RegisterController@nextresetpw');
Route::post('index/user/donextresetpw','Index\User\RegisterController@donextresetpw');

//加入购物车
Route::post('/home/addcart','Home\ShopcarController@addCart');

	// 邮箱激活
Route::get('/index/user/active/{email}','Index\User\RegisterController@active');

// 前台路由组中间件
Route::group(['prefix'=>'index','namespace'=>'Index','middleware'=>'index.login'],function(){

	// 前台退出
	Route::get('/user/loginout','LoginController@loginout');

	// 前台个人中心 
	Route::get('/user/personage','User\PersonageController@index');
	  
	//账户信息(个人资料)
	Route::get('/user/account','User\PersonageController@account');
	Route::get('/user/redact','User\PersonageController@redact');
	Route::post('/user/doredact','User\PersonageController@doredact');
	 //地址
	Route::get('/address/index','Address\AddressController@index');
	Route::get('/address/insert','Address\AddressController@insert');
	Route::get('/address/add','Address\AddressController@add');
	Route::get('/address/edit/{id}','Address\AddressController@edit');
	Route::post('/address/update','Address\AddressController@update');
	Route::get('/address/delete/{id}','Address\AddressController@delete');



	// 前台个人中心 
	Route::get('/user/personage','User\PersonageController@index');
	  
	//账户信息(个人资料)
	Route::get('/user/account','User\PersonageController@account');
	Route::get('/user/redact','User\PersonageController@redact');
	Route::post('/user/doredact','User\PersonageController@doredact');
	 //地址
	Route::get('/address/index','Address\AddressController@index');
	Route::get('/address/insert','Address\AddressController@insert');
	Route::get('/address/add','Address\AddressController@add');
	Route::get('/address/edit/{id}','Address\AddressController@edit');
	Route::post('/address/update','Address\AddressController@update');
	Route::get('/address/delete/{id}','Address\AddressController@delete');
	//收藏
	Route::get('/addshou/{id}','ShouController@add');
	Route::get('/shoulist','ShouController@list');
	Route::get('/shou/delete/{gid}','ShouController@delete');
	
});

Route::group(['middleware'=>'index.login'],function(){
	//购物车列表
	Route::get('/home/shopcar','Home\ShopcarController@cart');
	//删除商品
	Route::post('/home/shopcar/delcart','Home\ShopcarController@delcart');
	//前台订单  
	//下订单
	Route::get('home/ordersub/{gid}/{num}', 'Home\OrdersubController@index');	
	Route::get('home/ordersub', 'Home\OrdersubController@end');	
	//生成订单
	Route::get('home/ordersub/create', 'Home\OrdersubController@create');
	//个人订单
	Route::get('home/ordersub/geren', 'Home\OrdersubController@geren');	
});

	


// 后台登录
Route::get('admin/login','Admin\LoginController@login');
Route::get('admin/yzm','Admin\LoginController@yzm');
Route::post('admin/dologin','Admin\LoginController@dologin');

//后台路由组中间件
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'],function(){

	//后台首页
	Route::get('index','indexController@index');

	// 后台退出
	Route::get('loginout','LoginController@loginout');
	//后台商品图片
	Route::get('/goods/picture/{id}','GoodsController@picture');
	Route::post('/goods/addpic','GoodsController@addpic');
         
	//后台个人中心
	Route::get('personage/{id}','UsersController@personage');

	// 后台修改密码
	Route::get('resetpw/{id}','UsersController@resetpw');
	Route::post('doresetpw/{id}','UsersController@doresetpw');
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


	//后台订单管理
	Route::get('orders/up/{id}','OrdersController@up');
	Route::get('orders/down/{id}','OrdersController@down');
	Route::resource('orders','OrdersController');

	
	//商品上下架
	Route::get('/goods/up/{id}','GoodsController@up');
	Route::get('/goods/down/{id}','GoodsController@down');
	//后台商品
	Route::resource('/goods','GoodsController');


	//幻灯广告
	Route::get('/show/index','ShowController@index');
	// Route::get('/admin/show/add','Admin\ShowController@add');
	Route::post('/show/insert','ShowController@insert');
	Route::get('/show/edit/{id}','ShowController@edit');
	Route::post('/show/update','ShowController@update');
	Route::get('/show/delete/{id}','ShowController@delete');

	//修改排序的路由
	Route::post('/show/changeorder','ShowController@changeOrder');

	//友情链接
	Route::get('/frindlink/show/{id}','FriendlinkController@up');
	Route::get('/frindlink/hide/{id}','FriendlinkController@down');
	Route::resource('/friendlink','FriendlinkController');

	//分类
	Route::get('cate/add','cateController@add');
	Route::get('cate/edit/{id}','cateController@edit');
	Route::delete('cate/del/{id}','cateController@del');
	Route::put('cate/update/{id}','cateController@update');
	Route::post('cate/changeOrder/{id}','cateController@changeOrder');
	Route::post('config/changeOrder/{id}','ConfigController@changeOrder');
	Route::post('cate','Admin\cateController@store');


	Route::get('cate/list','cateController@index');

	//网站配置模块
	Route::resource('config','ConfigController');
	Route::post('config/changeContent','ConfigController@changeContent');
	Route::get('config/putcontent','ConfigController@putContent');

	//推荐位
	Route::get('recommend/index','RecommendController@index');
	Route::post('/recommend/insert','RecommendController@insert');
	Route::get('/recommend/edit/{id}','RecommendController@edit');
	Route::post('/recommend/update','RecommendController@update');
	Route::get('/recommend/delete/{id}','RecommendController@delete');

	//修改排序的路由
	Route::post('/recommend/changeorder','RecommendController@changeOrder');


	//广告位
	Route::get('/advertisement/index','AdvertisementController@index');
	Route::post('/advertisement/insert','AdvertisementController@insert');
	Route::get('/advertisement/edit/{id}','AdvertisementController@edit');
	Route::post('/advertisement/update','AdvertisementController@update');
	Route::get('/advertisement/delete/{id}','AdvertisementController@delete');

	//修改排序的路由
	Route::post('/advertisement/changeorder','AdvertisementController@changeOrder');

	Route::get('cate/list','cateController@index');

});


