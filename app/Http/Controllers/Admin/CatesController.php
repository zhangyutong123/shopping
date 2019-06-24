<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{

    public function getCateData()
    {
        //按条件查询
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();

        //遍历数据
        foreach ($cates as $key => $value) {
            $n = substr_count($value->path,',');

            $cates[$key]->cname = str_repeat('|----',$n).$value->cname;
        }
        return $cates;
    }
    /**
     * 列表页  主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        //加载页面
        return view('admin.cates.index',['cates'=>self::getCateData()]);
    }

    /**
     * 显示添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id',0);

        //加载页面
        return view('admin.cates.create',['id'=>$id,'cates'=>self::getCateData()]);
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取pid
        $pid = $request->input('pid',0);


        if($pid == 0){
            $path = 0;
        }else{
            //获取父级数据
            $parent_data = Cates::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }

        //将数据压入数据库
        $cate = new Cates;
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;  
        $res1 = $cate->save();

        if($res1){
            return redirect('admin/cates')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * 显示详情页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 显示修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $id = $request->input('id',0);
        $cates = Cates::where('id',$id)->first();

        return view('admin.cates.edit',['cates'=>$cates,'id'=>$id]);
    }

    /**
     * 执行修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //接收数据
        $cname = $request->input('cname',0);


        if($cname == ''){
            return back()->with('error','类名不能为空');
        }else{
            $data['cname'] = $cname;

            $res = DB::table('cates')->where('id',$id)->update($data);

            if($res){
                return redirect('/admin/cates')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }
    }

    /**
     * 删除数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //接收id
        $id = $request->input('id',0);

        //删除
        $res = DB::table('cates')->where('id',$id)->delete();

        if($res){
            return redirect('/admin/cates')->with('success','删除成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}
