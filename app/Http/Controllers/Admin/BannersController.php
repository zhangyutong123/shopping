<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banners;
use DB;

class BannersController extends Controller
{
    /**
     * 轮播图显示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 接收搜索的参数
        $search_bname = $request->input('search_bname','');

        $banners = Banners::where('bname','like','%'.$search_bname.'%')->paginate(5);
        // 加载页面
        return view('admin.banners.index',['banners'=>$banners,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示轮播图添加
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 执行轮播图添加
        
        DB::beginTransaction();
            
        // 上传图片
        if($request->hasFile('url')){
            // 创建文件上传对象
            $url = $request->file('url')->store(date('Ymd'));
        }else{
            $url = '';
        }

        // 接收数据
        $banner = new Banners;
        $banner->bname = $request->input('bname');
        $banner->url = $url;
        $res = $banner->save();

        // 判断是否执行成功
        if($res){
            DB::commit();
            return redirect('admin/banners')->with('success','添加成功');
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
        // 轮播图 修改
         $banner = Banners::find($id);

        // 加载修改页面
        return view('admin.banners.edit',['banner'=>$banner]);
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
        // 轮播图 执行修改
         DB::beginTransaction();
        // 获取轮播图片
        if($request->hasFile('url')){
            $url = $request->file('url')->store(date('Ymd'));
        }else{
            $url = $request->input('old_url');
        }

        // 接收数据
        $banner = Banners::first();
        $banner->bname = $request->input('bname');
        $banner->url = $url;
        $banner->status = $request->input('status');

        // 保存数据
        $res = $banner->save();

        // 判断是否执行成功
        if ($res) {
            DB::commit();
            return redirect('admin/banners')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $res = Banners::destroy($id);
        if($res){
            DB::commit();
            return redirect('admin/banners')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }

    // 轮播图状态
    public function statu($id)
    {
       $rs = Banners::find($id);
        if($rs->status == 0){
            $s['status'] =1;
        }else{
            $s['status']=0;
        }

        $data = Banners::where('id',$id)->update($s);
         if($data){

            return redirect('/admin/banners')->with('success','状态修改成功');
        } else {

            return back()->with('error','状态修改失败');
        }

    }
}
