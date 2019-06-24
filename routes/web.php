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

// 后台 登录
Route::get('admin','Admin\LoginController@login')->name('admin_login');
// 后台 执行登录
Route::post('admin/dologin','Admin\LoginController@dologin');
// 后台 退出
Route::get('admin/logout','Admin\LoginController@logout');
// 没有权限
Route::get('admin/rbac',function(){
	return view('admin.rbac');
});


// 后台 中间件/路由组
Route::group(['prefix'=>'admin','middleware'=>['admin_login']], function(){

	// 后台 首页
	Route::get('index','Admin\IndexController@index');
	// 修改 头像
	Route::get('upfile','Admin\LoginController@upfile');
	// 执行 头像 修改
	Route::post('dofile','Admin\LoginController@dofile');
	// 修改 密码
	Route::get('uppass','Admin\LoginController@uppass');
	// 执行 密码 修改
	Route::post('dopass','Admin\LoginController@dopass');
	// 后台 用户模块
	Route::resource('users','Admin\UsersController');
	// 后台 管理员
	Route::resource('adminuser','Admin\AdminuserController');
	// 后台 角色
	Route::resource('roles','Admin\RolesController');
	// 后台 权限
	Route::resource('nodes','Admin\NodesController');
	// 后台 轮播模块
	Route::resource('banners','Admin\BannersController');
	// 后台 公告模块
	Route::resource('announce','Admin\AnnounceController');
	// 后台 推荐位模块
	Route::resource('pushs','Admin\PushsController');
	// 后台 分类 
	Route::resource('cates','Admin\CatesController');
	// 商品 路由
	Route::resource('goods','Admin\GoodsController');
	// 特价商品 路由
	Route::resource('goods_cheap','Admin\Goods_cheapController');
	// 友情链接 路由
	Route::resource('links','Admin\LinksController');
	// 后台订单 路由
	Route::resource('orders','Admin\OrdersController');
	// 后台广告 路由
	Route::resource('advs','Admin\AdvsController');
	// 后台地址 路由
	Route::resource('address','Admin\AddressController');
	// 后台评价 路由
	Route::resource('replys','Admin\ReplysController');
});

Route::get('/','Home\IndexController@index');


// 前台路由
Route::group((['prefix'=>'home']),function(){

	 //前台注册 邮箱 手机号
	Route::get('register','Home\RegisterController@index');
	Route::get('register/sendPhone','Home\RegisterController@sendPhone');
	Route::get('login/index','Home\LoginController@index');
	Route::post('login/dologin','Home\LoginController@dologin');
	Route::post('login/dologin','Home\LoginController@dologin');
	Route::get('login/logout','Home\LoginController@logout');
	// 前台 首页
	Route::get('index/index','Home\IndexController@index');
	// 前台 分类
	Route::resource('/cates','Home\CatesController');
	//商品详情
	Route::get('/goods','Home\GoodsController@index');
	//购物车路由
	Route::get('/cars','Home\GoodsController@car');
	// 前台 个人中心 用户中心
	Route::get('personal/index','Home\PersonalController@index');	
	// 前台 个人中心 账户安全
	Route::get('personal/safe','Home\PersonalController@safe');	
	// 前台 个人中心 我的订单
	Route::get('personal/order','Home\PersonalController@order');	
	// 前台 个人中心 收货地址
	Route::get('personal/address','Home\PersonalController@address');	
	// 前台 购物车页面
	Route::resource('/cart','Home\CartController');
	// 前台 确认订单页
	Route::get('cart/confirm','Home\CartController@confirm');	
});


