<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cates;
use App\Models\Users;
use App\Models\UsersInfo;
use  DB;

class GoodsController extends Controller
{
    //商品详情
    public function index(Request $request){

    	$id = $request->input('id');
    	$cid = $request->input('cid');

    	$data = Goods::where('id',$id)->where('status',1)->get();

        $datas = Goods::where('cid',$cid)->get();
        
        $cates_data = Cates::get();

        //前台显示回复
        // $hf_data = Replys::get()->orderby('ctime','desc');
        $hf_data = DB::table('replys')->orderby('ctime','desc')->get();

        //
        return view('home.goods.goods_info',['data'=>$data,'datas'=>$datas,'cates_data'=>$cates_data,'hf_data'=>$hf_data]);
    }

    // public function car(Request $request){
    //     $id = $request->input('id');
        
    //     return view('home.cars.index');
    // }

    //前台执行回复
    public function hfeate(Request $request)
    {

        if(empty(session('home_userinfo')->id))
        {
          
         echo "<script>alert('请先登录');</script>";
         return view('home.login.index');

        }
       $res['uid'] = session('home_userinfo')->id;
       $res['gid'] = $request->input('gid');
      
       $res['ctime'] =date("Y-m-d h:i:s");
       $res['content']=$request->input('content');
    
       $res = DB::table('replys')->insert($res);
       if($res)
       {
        echo "<script>alert('回复成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";

       }
    
    } 
}
