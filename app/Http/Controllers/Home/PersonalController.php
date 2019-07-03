<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UsersInfo;
use App\Models\Goods;
use App\Models\Address;
use App\Http\Requests\StoreUsers;
use DB;
use Hash;

class PersonalController extends Controller
{
	// 个人中心显示
    public function index(request $request)
    {
        // 获取当前用户的id
        $id = session('home_userinfo')->id;
        // 查询用户表
        $users_data = Users::get();
        // 查询用户信息表 
        $users_info = Usersinfo::where('uid',$id)->first();

         //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

    	return view('home.personal.index',['id'=>$id,'links_data'=>$links_data,'users_info'=>$users_info]);
    }

    // 修改密码页面
    public function safe(request $request)
    {
        //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

        // 加载修改密码页面
    	return view('home.personal.safe',['links_data'=>$links_data]);
    }

    public function dosafe(request $request)
    {
        // 验证密码
        $this->validate($request, [     
                'oldpass' => 'required',
                'upass' => 'required|regex:/^[a-zA-Z]\w{5,17}$/',
                'repass' => 'required|same:upass'       
            ],[   
                'oldpass.required' => '原密码不能为空!',
                'upass.required' => '密码不能为空!',
                'upass.regex' => '密码格式不正确!',
                'repass.required' => '确认密码不能为空!',
                'repass.same' => '两次密码不一致!!'
          ]);

        // 获取旧密码
        $oldpass = $request->oldpass;
        
        // 获取当前用户的id
        $id = session('home_userinfo')->id;

        //获取当前用户的信息
        $result = Users::where('id',$id)->first();

        // 检测原密码是否正确
        if(!Hash::check($oldpass,$result->upass)){
            return back()->with('error','原密码错误');
        }

        // 密码加密
        $upass = Hash::make($request->input('upass'));

        $data['upass'] = $upass;

        $data = Users::where('id',$id)->update($data);

        if($data){
            return redirect('/home/login/index');
        }else{
            return back()->with('error','修改密码失败!!');
        }

    }

     // 订单页显示
    public function order(request $request)
    {
       //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

    	return view('home.personal.order',['links_data'=>$links_data]);
    }

     // 地址页显示
    public function address(request $request)
    {
        // 获取当前用户的id
        $id = session('home_userinfo')->id;
        // dd($id);
        $address_data = Address::get();
        // dd($address_data);
        $user = Address::where('uid',$id)->get();
        // dd($user->uname);
        
        //友情链接
        $links_data = DB::table('links')->where('status',1)->get();
      
    	return view('home.personal.address',['address_data'=>$address_data,'links_data'=>$links_data]);
    }

    // 添加地址页
    public function addaddress(request $request)
    {
        //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

        return view('home.personal.addaddress',['links_data'=>$links_data]);
    }

    // 执行添加地址页
    public function doaddress(request $request)
    {

         // 数据验证
         $this->validate($request, [
            'aname' => 'required',
            'aphone' => 'required',
            'province'=>'required',
            'code' => 'required',
        ],[
            'aname.required'=>'收货人姓名不能为空!',
            'aphone.required'=>'手机号不能为空!!',
            'province.required'=>'请填写收货地址!',
            'code.required'=>'请填写邮政编码!',
        ]);

         // 开启事务
         DB::beginTransaction();

         // 将接到的值放入数据库
         $address = new Address;
         $address->uid = session('home_userinfo')->id;
         $address->aname = $request->input('aname');
         $address->aphone = $request->input('aphone');
         $address->province = $request->input('province');
         $address->code = $request->input('code');

         // 保存数据
         $result = $address->save();

         // 判断是否执行成功
        if($result){
            DB::commit();
            return redirect('/home/personal/address');
        }else{
            DB::rollBack();
            return back();
        }
    }

    // 修改地址页
    public function upaddress( request $request)
    {
        $id = $request->input('id');
        $address = Address::find($id);

        //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

        return view('home.personal.upaddress',['address'=>$address,'links_data'=>$links_data]);
    }

    // 执行修改
    public function doupaddress(request $request,$id)
    {



        // 开启事务
         DB::beginTransaction();
         $address = Address::find($id);
        //  dd($address);
         $address->id = $id;
         $address->uid = session('home_userinfo')->id;
         $address->aname = $request->input('aname');
         $address->aphone = $request->input('aphone');
         $address->province = $request->input('province');
         $address->code = $request->input('code');
         // 保存数据
         $result = $address->save();

         // 判断是否执行成功
        if($result){
            DB::commit();
            return redirect('/home/personal/address');
        }else{
            DB::rollBack();
            return back();
        }
    }

    // 地址页删除操作
    public function del(Request $request)
    {
        $id = $request->input('id');
        // dd($id);
        DB::beginTransaction();
        $result = Address::destroy($id);

        if($result){
            DB::commit();
            return redirect('/home/personal/address');
        }else{
            DB::rollBack();
            return back();
        }
    }

    // 修改信息
    public function upinfo()
    {
        
        // 获取当前用户的id
        $id = session('home_userinfo')->id;
        // 查询用户表
        $user = Users::where('id',$id)->first();
        // 查询用户信息表
        $users_info = Usersinfo::where('uid',$id)->first();

        //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

        return view('home.personal.upinfo',['user'=>$user,'users_info'=>$users_info,'links_data'=>$links_data]);
    }

    // 执行修改
    public function doinfo(request $request)
    {   
        
        DB::beginTransaction();
        $id = session('home_userinfo')->id;
         // 获取头像
        if($request->hasFile('profile')){
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_profile');
        }
       
        //接收数据
        $uname = $request->input('uname');
        $uuname = $request->input('uuname');
        $email = $request->input('email');
        $tel = $request->input('tel');


        $user = Users::where('id',$id)->first(); 
        $user->uname = $uname;
        $userinfo = UsersInfo::where('uid',$id)->first();
        $userinfo->uname = $uuname;
        $userinfo->email = $email;
        $userinfo->tel = $tel;
        $userinfo->profile = $file_path;



        // 保存数据
        $res1 = $user->save();
        $res2  = $userinfo->save();

        // 判断执行是否成功
        if ($res1 && $res2 ) {
            DB::commit();
            return redirect('/home/personal/upinfo');
        }else{
            DB::rollBack();
            return back();
        }
    }
}
