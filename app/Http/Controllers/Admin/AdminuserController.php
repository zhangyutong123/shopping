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
        
        // 加载后台页面
        return view('admin.adminuser.index',['data'=>$data,'params'=>$request->all()]);

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
        // 数据验证

        $this->validate($request, [
            'uname' => 'required',
            'upass' => 'required',
            'repass' => 'required',
            'rid' => 'required',
        ],[
            'uname.required'=>'请填写用户名称!',
            'upass.required'=>'请填写密码!',
            'repass.required'=>'请确认密码!',
            'rid.required'=>'请选择角色!',
        ]);

        // 开启事务
        DB::beginTransaction();

        // 接收数据
        $uname = $request->input('uname',''); 
        $upass = $request->input('upass',''); 
        $repass = $request->input('repass',''); 
        $rid = $request->input('rid',''); 

        // 上传图片
        if($request->hasFile('profile')){
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = '';
        }

        // 判断密码是否一致
        if($upass != $repass){
            return back()->with('error','俩次密码不一致');
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
        // // 获取数据库信息
        // $adminuser = Adminuser::find($id);
        // // 获取所有角色
        // $roles_data = DB::table('roles')->get();

        // $adminrol = DB::table('adminusers_roles')->where('uid',$id)->first();
        // // 加载修改页面
        // return view('admin.adminuser.edit',['adminuser'=>$adminuser,'roles_data'=>$roles_data,'adminrol'=>$adminrol]);
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
        // // 获取头像
        // if ($request->hasFile('profile')) {

        //     // 删除以前旧的图片
        //     Storage::delete($request->input('old_profile'));

        //     $file_path = $request->file('profile')->store(date('Ymd'));
        // }else{
        //     $file_path = $request->input('old_profile');
        // }

        // $rid = $request->input('rid','');

        // $adminuser = DB::table('admin_users')::find($id);
        // $adminuser['profile'] = $file_path;

        // $uid = $adminuser->save();
        // $res = DB::table('adminusers_roles')->update(['uid'=>$uid,'rid'=>$rid]);

        // if($uid && $res){
        //     return redirect('admin/adminuser')->with('success','修改成功');
        // }else{

        //     return back()->with('error','修改失败');
        // }
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
