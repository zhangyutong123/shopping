<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
// use Storage;

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
        public function readiuse(Request $request)
        {


            // 接收值
            $dapa = $request->all();
            $id = $dapa['id'];
            $oldpass = $dapa['oldpass'];

            // 验证
            if(empty($oldpass)){
                return back()->with('error','原密码必填');
            }
            if(empty($dapa['upass'])){
                return back()->with('error','密码必填');
            }
            if($dapa['upass'] !== $dapa['qrpass']){
                return back()->with('error','俩次密码不一致');
            }


            // 将密码加密
            $upass =  Hash::make($dapa['upass']);   
            // 查询数据 判断原密码是否一致
            $data = DB::table('admin_users')->where('id',$id)->first();
            // 验证密码
            if(!Hash::check($oldpass, $data->upass)){
                return back()->with('error','用户名或密码格式错误');
            }else{
                $res = DB::table('admin_users')->where('id',$id)->update(['upass'=>$upass]);
                if($res){
                    return redirect('admin/')->with('success','修改成功');
                }else{
                    return back()->with('error','修改失败');
                }
            } 


        }

        // 修改头像
        public function profile(Request $request)
        {
            // 执行文件上传
            if($request->hasFile('profile')){


                // 删除以前 旧图片
                Storage::delete($request->input('profile_path'));


                $profile = $request->file('profile')->store(date('Ymd'));
            }else{
                $profile = $request->input('profile_path');
            }
            $id = $request->input('id');
            // 执行修改
            $res = DB::table('admin_users')->where('id',$id)->update(['profile'=>$profile]);
            // 判断逻辑
            if($res){
                // 获取 id 查询出图片路径 将其填入到 session
                $id = session('admin_userinfo')->id;
                $data = DB::table('admin_users')->where('id',$id)->first();
                session('admin_userinfo')->profile = $data->profile;


                // 跳转页面
                return redirect('admin/user/index')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }
        }
}
