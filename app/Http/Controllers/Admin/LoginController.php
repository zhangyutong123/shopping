<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Storage;

class LoginController extends Controller
{
    // 后台 登录
    public function login()
    {   
        // 加载后台登录页面
        return view('admin.index.login');
    }

    // 执行 后台 登录
    public function dologin(request $request)
    {
        
        $uname = $request->input('uname','');
        $upass = $request->input('upass','');

        // 获取数据
        $data = DB::table('admin_users')->where('uname',$uname)->first();
        

        // 用户错误
        if (empty($data)) {
            return back()->with('error','用户名或密码错误');
        }

        // 验证密码
        if (!Hash::check($upass,$data->upass)) {
            return back()->with('error','用户名或密码错误');
        }

        // 登录
        session(['admin_login'=>true]);
        session(['admin_userinfo'=>$data]);

        // 获取当前用户的权限
        $data = DB::select('select n.aname,n.cname from nodes as n,roles_nodes as rn,adminusers_roles as ur where ur.uid = '.$data->id.' and ur.rid = rn.rid and rn.nid = n.id');
        
        $temp = [];
        foreach ($data as $key => $value) {
            $temp[$value->cname][] = $value->aname;
            if($value->aname == 'create'){
                $temp[$value->cname][] = 'store';
            }
            if($value->aname == 'edit'){
                $temp[$value->cname][] = 'update';
            }

            if($value->aname == 'index'){
                $temp[$value->cname][] = 'show';
            }
        }

        session(['data'=>$temp]);

        // 跳转
        return redirect('admin/index');
    }

    // 退出
    public function logout()
    {
        session(['admin_login'=>false]);
        session(['admin_userinfo'=>false]);
        return back();
    }

    // 修改密码
    public function uppass(Request $request)
    {

        return view('admin.upfile_uppass.uppass');
    }

    // 执行修改密码
    public function dopass(request $request)
    {
        // 验证密码
        $this->validate($request, [     
                'oldpass' => 'required',
                'upass' => 'required|regex:/^[a-zA-Z]\w{5,17}$/',
                'repass' => 'required|same:upass'       
            ],[   
                'oldpass.required' => '旧密码不能为空!',
                'upass.required' => '密码不能为空!',
                'upass.regex' => '密码格式不正确!',
                'repass.required' => '确认密码不能为空!',
                'repass.same' => '两次密码不一致!!'
          ]);

        // 获取旧密码
        $oldpass = $request
    }

    // 修改头像
    public function upfile(Request $request)
    {
        $id = session('admin_userinfo')->id;
        $data = DB::table('admin_users')->where('id',$id)->first();
        // dd($data);
        return view('admin.upfile_uppass.upfile',['data'=>$data]);

    }

    // 执行修改头像
    public function dofile(Request $request)
    {
         $id = session('admin_userinfo')->id;
        $file = $request->file('profile');
        // dd($file);

        if ($request->hasFile('profile')) {

            // 删除以前 旧图片
            Storage::delete($request->input('profile_path'));

            // 如果修改了 接收新头像
            $file_path = $request->file('profile')->store(date('Ymd'));
        } else {
            // 如果没修改头像 接收以前的头像
            $file_path = $request->input('old_profile');
        }

        $data['profile'] = $file_path;

        // 执行修改
        $result = DB::table('admin_users')->update($data);

        // 判断逻辑
        if($result){

            // 获取管理员id 查询出图片路径 将其填入session
            $id = session('admin_userinfo')->id;
            $data = DB::table('admin_users')->where('id',$id)->first();
            session('admin_userinfo')->profile = $data->profile;

            // 跳转页面
            return redirect('admin/index')->with('success','修改成功!!');
        } else {
            return back()->with('error','修改失败!!');
        }
    }
}
