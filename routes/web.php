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
// 后台 修改头像
Route::post('admin/profile','Admin\IndexController@profile');
// 后台 修改密码
Route::post('admin/change','Admin\IndexController@change');

// 后台 中间件/路由组
Route::group(['prefix'=>'admin','middleware'=>['admin_login']], function(){

	// 后台 首页
	Route::get('index','Admin\IndexController@index');
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
});

Route::get('/','Home\IndexController@index');

// 前台路由
Route::group((['prefix'=>'home']),function(){

	// 前台 登录 
	Route::get('login/login','Home\LoginController@login');
	Route::post('login/dologin','Home\LoginController@dologin');
	// 前台 退出
	Route::get('login/logout','Home\LoginController@logout');
	// 前台 注册
	Route::get('register/index','Home\RegisterController@index');
	// 前台 执行 注册
	Route::post('register/store','Home\RegisterController@store');
	// 前台 首页
	Route::get('index/index','Home\IndexController@index');
	
});