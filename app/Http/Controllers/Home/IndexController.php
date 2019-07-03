<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Banners;
use App\Models\Announces;
use DB;

class IndexController extends Controller
{
   
    /**
     * 主页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //获取所有父类id下的子分类
      
        
        // 获取轮播图
        $banners_data = Banners::where('status',1)->get();

        // 获取公告
        $announces_data = Announces::get();

        // 商品分类
        $cates_data = Cates::get();

        // 热门商品
        $goods_hot = Goods::where('status',1)->orderby('id','desc')->get();

        // 首页推荐位
        $goods = Goods::where('status',1)->get();

        // 广告商
        $advs_data = DB::table('advs')->where('title','李慧宇')->first();

         //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

        // 显示模板
        return view('home.index.index',['advs_data'=>$advs_data,'links_data'=>$links_data,'banners_data'=>$banners_data,'announces_data'=>$announces_data,'cates_data'=>$cates_data,'goods_hot'=>$goods_hot,'goods'=>$goods]);
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
     * 公告栏内容显示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        $id = $request->input('id');
        // 获取公告
        $announces_data = Announces::find($id);

        $search = $request->input('search','');
        $goods_data = Goods::where('gname','like','%'.$search.'%')->get();

         //友情链接
        $links_data = DB::table('links')->where('status',1)->get();

        // 加载页面
        return view('home.index.announce',['links_data'=>$links_data,'announces_data'=>$announces_data,'search'=>$search,'goods_data'=>$goods_data]);
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
