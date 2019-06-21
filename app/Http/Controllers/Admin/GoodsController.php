<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Cates;
use App\Models\Goods;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::all();
        $cates = Cates::all();
    	
    	//加载html页面
    	return view('admin.goods.index',['goods'=>$goods,'cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function create()
    {
        $cates = Cates::all();

        return view('admin.goods.create',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //检测文件上传
        if($request->hasFile('pic')){
            $pic = $request->file('pic')->store(date('Ymd'));
        }else{
            return back()->with('error','请选择图片');
        }

        //接收数据
        $data['gname'] = $request->input('gname','');
        $data['price'] = $request->input('price','');
        $data['pic'] = $pic;
        $data['status'] = $request->input('status','');
        $data['brand'] = $request->input('brand','');
        $data['cid'] = $request->input('cid','');

        //dd($data);
        
        //执行 添加到数据库
        $res = DB::table('goods')->insert($data);

        if($res){
            return redirect('/admin/goods')->with('success','添加成功');
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
        $cid = $request->input('cid',0);
        $cates = Cates::all();
        $goods =Goods::where('id',$id)->first();

        //跳转
        return view('admin.goods.edit',['cid'=>$cid,'goods'=>$goods,'cates'=>$cates]);
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
        if($request->hasFile('pic')){

            //删除以前图片
            Storage::delete($request->input('pic_path'));


            $pic = $request->file('pic')->store(date('Ymd'));
        }else{
            $pic = $request->input('pic_path');
        }

        //接收用户的值
        $data['gname'] = $request->input('gname','');
        $data['price'] = $request->input('price','');
        $data['pic'] = $pic;
        $data['status'] = $request->input('status','');
        $data['brand'] = $request->input('brand','');
        $data['cid'] = $request->input('cid','');

        //执行修改
        // $res = Goods::where('id',$id)->update($data);
        $res = DB::table('goods')->where('id',$id)->update($data);

        if($res){
            return redirect('/admin/goods')->with('success','修改成功');
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
        $res = DB::table('goods')->where('id',$id)->delete();
        if($res){
            return redirect('/admin/goods')->with('success','删除成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}
