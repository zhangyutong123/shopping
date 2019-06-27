<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminuserController extends Controller
{
    /**
     * 显示页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 接收搜索的参数
        $search_auname = $request->input('search_auname','');

        // 查询管理员表
        $data = DB::table('admin_users')->where('uname','like','%'.$search_auname.'%')->paginate(5);
        $roles_data = DB::table('roles')->get();
        
        
        // 加载后台页面
        return view('admin.adminuser.index',['data'=>$data,'roles_data'=>$roles_data,'params'=>$request->all()]);

    }

    /**
     * 添加角色
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // 获取所有的 角色
        $roles_data = DB::table('roles')->get();

        // 加载页面
        return view('admin.adminuser.create',['roles_data'=>$roles_data]);
        
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 开启事务
        DB::beginTransaction();

        // 接收数据
        $uname = $request->input('uname',''); 
        $upass = $request->input('upass',''); 
        $repass = $request->input('repass',''); 
        $rid = $request->input('rid',''); 

        // 判断密码是否一致
        if($upass != $repass){
            return back()->width('error','俩次密码不一致');
        }

        // 文件上传
        if($request->hasFile('profile')){
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = '';
        }

        // 把数据赋值给数据并且添加到到管理员表中
        $temp['uname'] = $uname;
        $temp['upass'] = Hash::make($upass);
        $temp['profile'] = $path;

        // 获取用户对应的id并执行添加操作
        $uid = DB::table('admin_users')->insertGetId($temp);
        $res  = DB::table('adminusers_roles')->insert(['uid'=>$uid,'rid'=>$rid]);

        // 执行判断
        if($uid && $res){
            DB::commit();
            return redirect('admin/adminuser')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
            DB::rollBack();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 执行删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 根据id查询表信息并进行删除操作
        $result = DB::table('admin_users')->where('id',$id)->delete();

        // 执行判断
        if($result){
            return redirect('/admin/adminuser')->with('success','删除成功');

        }else{
            return back()->with('error','删除失败');
        }   
    }
}
