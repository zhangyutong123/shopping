<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 商品列表
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(request $request,$id)
    {
        //接收搜索参数
        $search = $request->input('search','');
        
        //
        $datas = Goods::where('cid',$id)->where('status',1)->paginate(5);
        $cates_data = Cates::get();

         //友情链接
        $links_data = DB::table('links')->where('status',1)->get();
        
        //加载页面
        return view('home.cates.index',['links_data'=>$links_data,'datas'=>$datas,'search'=>$search,'cates_data'=>$cates_data]);
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
        //
    }
}
