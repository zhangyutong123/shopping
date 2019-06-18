<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announces;
use DB;

class AnnounceController extends Controller
{
    /**
     * 公告显示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 接收搜索的参数
        $search_aname = $request->input('search_aname','');

        $announces = Announces::where('aname','like','%'.$search_aname.'%')->paginate(5);

        // 加载页面
        return view('admin.announces.index',['announces'=>$announces,'params'=>$request->all()]);
    }

    /**
     * 公告添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示公告添加
        return view('admin.announces.create');
    }

    /**
     * 公告 执行 添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行公告添加
        DB::beginTransaction();         

        // 接收数据
        $announce = new Announces;
        $announce->aname = $request->input('aname');
        $announce->alabel = $request->input('alabel');
        $announce->acontent = $request->input('acontent');
        $res = $announce->save();

        // 判断是否执行成功
        if($res){
            DB::commit();
            return redirect('admin/announce')->with('success','添加成功');
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
     * 公告 修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $announce = Announces::find($id);

         // 加载公告页面
         return view('admin.announces.edit',['announce'=>$announce]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         DB::beginTransaction();

        // 接收数据
        $announce = Announces::first();
        $announce->aname = $request->input('aname');
        $announce->alabel = $request->input('alabel');
        $announce->acontent = $request->input('acontent');

        // 保存数据
        $res = $announce->save();

        // 判断是否执行成功
        if($res){
            DB::commit();
            return redirect('admin/announce')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }
    }

    /**
     * 公告 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::beginTransaction();

         // 删除指定id的公告
        $res = Announces::destroy($id);

        // 判断是否执行成功
        if($res){
            DB::commit();
            return redirect('admin/announce')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
