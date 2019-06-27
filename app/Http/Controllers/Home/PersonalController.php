<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
	// 个人中心显示
    public function index()
    {
    	return view('home.personal.index');
    }

    // 账户安全显示
    public function safe()
    {
    	return view('home.personal.safe');
    }

     // 订单页显示
    public function order()
    {
    	return view('home.personal.order');
    }

     // 地址页显示
    public function address()
    {
    	return view('home.personal.address');
    }
}
