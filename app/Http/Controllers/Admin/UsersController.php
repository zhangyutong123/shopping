<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsers;
use App\Models\Users;
use App\Models\UsersInfo;
use Hash;
use Storage;
use DB;
class UsersController extends Controller
{

    /**
     * 用户列表显示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收搜索的参数
        $search_uname = $request->input('search_uname','');

        $users = Users::where('uname','like','%'.$search_uname.'%')->paginate(5);
        // 加载页面
        return view('admin.users.index',['users'=>$users,'params'=>$request->all()]);
    }

 
    /**
     * 显示添加用户页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示用户添加
        return view('admin.users.create');
    }

    /**
     * 执行添加用户
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {
        DB::beginTransaction();
            
        // 上传头像
        if($request->hasFile('profile')){
            // 创建文件上传对象
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = '';
        }

         // 接收邮箱和电话号
         $email = $request->input('email');
         $tel = $request->input('tel');

        // 接收数据
        $user = new Users;
        $user->uname = $request->input('uname');
        $user->upass = Hash::make($request->input('upass'));
        $res1 = $user->save();
        if($res1){
            // 获取uid
            $uid = $user->id;
        }

        // 压入头像并接收email和tel
        $userinfo = new UsersInfo;
        $userinfo->uid = $uid;
        $userinfo->email = $email;
        $userinfo->tel = $tel;
        $userinfo->profile = $file_path;

        //保存数据
        $res2 = $userinfo->save();

        // 判断是否执行成功
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
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
     * 显示修改用户页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);


        // 加载修改页面
        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * 修改用户
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         DB::beginTransaction();
        // 获取头像
        if($request->hasFile('profile')){
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_profile');
        }

        // 接收数据
        $userinfo = UsersInfo::where('uid',$id)->first();
        $email = $request->input('email');
        $tel = $request->input('tel');
        $userinfo->email = $email;
        $userinfo->tel = $tel;
        $userinfo->profile = $file_path;

        // 保存数据
        $res = $userinfo->save();

        // 判断是否执行成功
        if ($res) {
            DB::commit();
            return redirect('admin/users')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }

    }

    /**
     * 删除用户
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::beginTransaction();
        $res1 = Users::destroy($id);
        $res2 = UsersInfo::where('uid',$id)->delete();

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
