<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NodesController extends Controller
{
    /**
     * 权限显示页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 接收搜索的参数
       $search_dname = $request->input('search_dname','');

       // 获取数据库中的数据(根据权限名称进行搜索操作)
       $data = DB::table('nodes')->where('desc','like','%'.$search_dname.'%')->paginate(5);
        // 加载模板
        return view('admin.nodes.index',['data'=>$data,'params'=>$request->all()]);
    }

    /**
     * 权限添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模板
        return view('admin.nodes.create');
    }

    /**
     * 权限执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收表单中的数据
        $cname = $request->input('cname');
        $controller = $cname.'controller';
        $aname = $request->input('aname');
        $desc = $request->input('desc');

        // 执行添加操作
        $res = DB::table('nodes')->insert(['cname'=>$controller,'aname'=>$aname,'desc'=>$desc]);

        // 执行判断
        if($res){
            return redirect('admin/nodes')->with('success','添加成功');
        }else{
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * 执行删除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 根据id查询数据并进行删除
        $result = DB::table('nodes')->where('id',$id)->delete();

        // 判断删除是否成功
        if($result){
            return redirect('/admin/nodes')->with('success','删除成功');

        }else{
            return back()->with('error','删除失败');
        }   
    }
}
