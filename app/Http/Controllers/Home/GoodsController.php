<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cates;

class GoodsController extends Controller
{
    //商品详情
    public function index(Request $request){

    	$id = $request->input('id');
    	$cid = $request->input('cid');

    	$data = Goods::where('id',$id)->where('status',1)->get();

        $datas = Goods::where('cid',$cid)->get();
        
        $cates_data = Cates::get();
        //
        return view('home.goods.goods_info',['data'=>$data,'datas'=>$datas,'cates_data'=>$cates_data]);
    }

    
}
