<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Captcha;
use Hash;
use DB;
class LoginController extends Controller
{
    //
   public function index()
	{
		return view('home.login.index');
	}

	//验证 登陆
    public function dologin(Request $request)
    {
    	 $this->validate($request, [
            'uname' => 'required',
            'upass' => 'required',
        ],[
          'uname.required'=>'手机号必填',
          'upass.required'=>'密码必填',
        ]);
      $uname = $request->input('uname','');
      $upass = $request->input('upass','');
      //获取数据
      $data = DB::table('users')->where('uname',$uname)->first();
      // dd($uname,$upass,$data);
   
      //验证密码
      if(!Hash::check($upass,$data->upass)){
         return back()->with('error','用户名或密码错误');
      }
       // 登录
        session(['home_login'=>true]);
        session(['home_userinfo'=>$data]);

      $temp = [];
      session(['data'=>$temp]);
      return redirect('/');
    }


    //退出登陆
    public function logout()
    {
      session(['home_login'=>null]);
      session(['home_userinfo'=>null]);
      return  back();
    }
}
