<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Advs;
use DB;
class AdvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收搜索的参数
        $search_title = $request->input('search_title','');

        $advs = Advs::where('title','like','%'.$search_title.'%')->paginate(5);
        // 加载页面

        return view('admin.advs.index',['advs'=>$advs,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面


        return view('admin.advs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //开启事物
        DB::beginTransaction();
        
        //上传图片
        if($request->hasFile('url')){
            //创建上传文件对象
            $url = $request->file('url')->store(date("Ymd"));
        }else{
            $url="";
        }

        //接收数据
        $advs = new Advs;
        $advs->title = $request->input('title');
        $advs->url = $url;
        $res = $advs ->save();

          // 验证表单
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
        ],[
            'title.required'=>'广告标题必填',
            'url.required'=>'广告图片必填',
        ]);

        //判断文件是否上传
             if($res){
            DB::commit();
            return redirect('admin/advs')->with('success','添加成功');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
             // 轮播图 修改
         $advs = Advs::find($id);

        // 加载修改页面
        return view('admin.advs.edit',['advs'=>$advs]);
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
        //
        DB::beginTransaction();
        $res = Advs::destroy($id);
        if($res){
            DB::commit();
            return redirect('admin/advs')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
