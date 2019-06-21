<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods_cheap;
use DB;

class Goods_cheapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods_cheap = Goods_cheap::all();
        
        //加载html页面
        return view('admin.goods_cheap.index',['goods_cheap'=>$goods_cheap]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //引用页面
        return view('admin.goods_cheap.create');
    }

    /**_cheap
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //检测文件上传
        if($request->hasFile('gcprofile')){
            $gcprofile = $request->file('gcprofile')->store(date('Ymd'));
        }else{
            return back()->with('error','请选择图片');
        }

        //验证表单
        // $this->validate($request,[
        //     'gcname' => 'required',
        //     'gcprice' => 'required',
        //     'gprice' => 'required',
        //     'gcsize' => 'required',
        // ],[
        //     'gcname.required' => '特价商品名称必填',
        //     'gcprice.required' => '特价商品价格必填',
        //     'gprice.required' => '特价商品原价必填',
        //     'gcsize.required' => '特价商品尺码必填',
        // ]);

        //接收数据
        $data['gcname'] = $request->input('gcname','');
        $data['gcprice'] = $request->input('gcprice','');
        $data['gprice'] = $request->input('gprice','');
        $data['gcsize'] = $request->input('gcsize','');
        $data['gcprofile'] = $gcprofile;

        if($data['gcprice'] >= $data['gprice']){
            return back()->with('error','您不觉得特价应该比原价低吗?');
        }
        
        
        //执行 添加到数据库
        $res = DB::table('goods_cheap')->insert($data);

        if($res){
            return redirect('admin/goods_cheap')->with('success','添加成功');
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
        //获取用户信息
        $id = $request->input('id',0);
        $goods_cheap =Goods_cheap::where('id',$id)->first();

        //跳转
        return view('admin.goods_cheap.edit',['goods_cheap'=>$goods_cheap]);
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
        //执行文件上传
        if($request->hasFile('gcprofile')){

            //删除以前图片
            Storage::delete($request->input('gcprofile_path'));


            $gcprofile = $request->file('gcprofile')->store(date('Ymd'));
        }else{
            $gcprofile = $request->input('gcprofile_path');
        }

         //接收数据
        $data['gcname'] = $request->input('gcname','');
        $data['gcprice'] = $request->input('gcprice','');
        $data['gprice'] = $request->input('gprice','');
        $data['gcsize'] = $request->input('gcsize','');
        $data['gcprofile'] = $gcprofile;


        //执行修改
        // $res = Goods::where('id',$id)->update($data);
        $res = DB::table('goods_cheap')->where('id',$id)->update($data);

        if($res){
            return redirect('/admin/goods_cheap')->with('success','修改成功');
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
        $res = DB::table('goods_cheap')->where('id',$id)->delete();
        if($res){
            return redirect('/admin/goods_cheap')->with('success','删除成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}
