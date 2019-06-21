<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Links;
use DB;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Links::all();
        
        //加载html页面
        return view('admin.links.index',['links'=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载页面
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $data['lname'] = $request->input('lname','');
        $data['url'] = $request->input('url','');

        //执行 添加到数据库
        $res = DB::table('links')->insert($data);

        if($res){
            return redirect('admin/links')->with('success','添加成功');
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
    public function edit(Request $request)
    {
        //接收数据
        $id = $request->input('id',0);
        $links =Links::where('id',$id)->first();

        return view('admin.links.edit',['links'=>$links]);
        
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
        //接收数据
        $data['lname'] = $request->input('lname','');
        $data['url'] = $request->input('url','');

        //执行 添加到数据库
        $res = DB::table('links')->update($data);

        if($res){
            return redirect('/admin/links')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->input('id',0);

        //删除
        $res = DB::table('links')->where('id',$id)->delete();
        
        if($res){
            return redirect('/admin/links')->with('success','删除成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}
