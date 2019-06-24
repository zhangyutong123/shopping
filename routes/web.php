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

// 后台 中间件/路由组
Route::group(['prefix'=>'admin','middleware'=>['admin_login']], function(){

	// 后台 首页
	Route::get('index','Admin\IndexController@index');
	//修改头像
	Route::get('upfile','Admin\LoginController@upfile');
	Route::post('dofile','Admin\LoginController@dofile');
	//修改密码
	Route::get('uppass','Admin\LoginController@uppass');
	Route::post('dopass','Admin\LoginController@dopass');
	// 后台 用户模块
	Route::resource('users','Admin\UsersController');
	// 后台 管理员
	Route::resource('adminuser','Admin\AdminuserController');
	// 后台  角色
	Route::resource('roles','Admin\RolesController');
	// 后台 权限
	Route::resource('nodes','Admin\NodesController');
	// 后台 轮播模块
	Route::resource('banners','Admin\BannersController');
	// 后台 轮播状态
	Route::get('banners/{id}','Admin\BannersController@statu');
	// 后台 公告模块
	Route::resource('announce','Admin\AnnounceController');
	// 后台 推荐位模块
	Route::resource('pushs','Admin\PushsController');
	// 后台 分类 
	Route::resource('cates','Admin\CatesController');
	//商品路由
	Route::resource('goods','Admin\GoodsController');
	//特价商品路由
	Route::resource('goods_cheap','Admin\Goods_cheapController');
	//友情链接路由
	Route::resource('links','Admin\LinksController');
	//后台订单路由
	Route::resource('orders','Admin\OrdersController');
	//后台广告路由
	Route::resource('advs','Admin\AdvsController');
	//后台地址路由
	Route::resource('address','Admin\AddressController');
	//后台评价路由
	Route::resource('replys','Admin\ReplysController');
});
































































//前台分类
Route::resource('/home/cates','Home\CatesController');

Route::get('/','Home\IndexController@index');
 //前台注册 邮箱 手机号
Route::get('home/register','Home\RegisterController@index');
Route::get('home/register/sendPhone','Home\RegisterController@sendPhone');
Route::get('home/login/index','Home\LoginController@index');
Route::post('home/login/dologin','Home\LoginController@dologin');
Route::post('home/login/dologin','Home\LoginController@dologin');
 Route::get('home/login/logout','Home\LoginController@logout');

