<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PushsController extends Controller
{
    /**
     * 推荐位 显示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $data = DB::table('goods_pushs')->select('*',DB::raw('concat(path,",",id) as paths'))->orderBy('paths','asc');

        // 加载页面
        return view('admin.pushs.index',['data'=>$data]);
    }

    /**
     * 添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
         // 接收添加子栏目的id
        $id = $request->input('id',0);

         // 获取所有的栏目
        $data = DB::table('goods_pushs')->select('*',DB::raw('concat(path,",",id) as paths'))->orderBy('paths','asc')->get();
        
        foreach($data as $k=>$v){
            if ($v->pid != 0) {
                $data[$k]->pname = '|--------'.$v->pname;
            }
        }

        // 显示页面
        return view('admin.pushs.create',['id'=>$id,'data'=>$data]);
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pname' => 'required',
        ],[
            'pname.required'=>'请填写您要输入的名称!',
        ]);


        $pid = $request->input('pid');


        if ($pid == 0) {
            $path = 0;
        } else {
            // 获取父级数据
            $parent_data = DB::table('goods_pushs')->where('id',$pid)->first();
            $path = $parent_data->path.','.$parent_data->id;
        }


        $data['pid'] = $pid;
        $data['pname'] = $request->input('pname','');
        $data['path'] = $path;

        // 将数据压入到数据库
        $res = DB::table('goods_pushs')->insert($data);
        if($res){
             return redirect('admin/pushs/index')->with('success','添加成功');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =  $request->input('id',0);

        // 删除
        $res = DB::table('goods_pushs')->where('id',$id)->delete();
        
        if($res){
            echo "ok";
        }else{
            echo "删除失败!!";
        }
    }
}
