<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cates;
use App\Models\Carts;
use DB;

class CartController extends Controller
{
    /**
     * 购物车显示页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $goods_data = Goods::where('gname','like','%'.$search.'%')->get();
        //获取传过来的值
        $id = $request->input('id');
        $num = $request->input('num');
        $cid = $request->input('cid');
        $uid = 1;
        //查询商品表中指定商品
        $data = Goods::where('id',$id)->where('status',1)->get();
        //查询商品表中和指定商品类型一样的商品
        $datas = Goods::where('cid',$cid)->get();
        //将传过来的数据保存在数组中
        $data_in['gid'] = $id;
        $data_in['num'] = $num;
        $data_in['uid'] = $uid;
        //写入购物车库语句
        $res = DB::table('carts')->insert($data_in);

        $cates_data = Cates::get();
        
        if($res){

            $datas_c = Carts::where('uid',1)->get();

            if(empty($datas_c)){
                $all = 0;
            }else{
                $all = 0;
                foreach($data as $k=>$v){
                    foreach($datas_c as $kk=>$vv){
                        $all += $v->price*$vv->num;
                        $uid = $vv->uid;
                    }
                }
                
            }
            
            return view('home.cart.index',['data'=>$data,'datas'=>$datas,'goods_data'=>$goods_data,'search'=>$search,'cates_data'=>$cates_data,'datas_c'=>$datas_c,'all'=>$all,'uid'=>$uid]);
        }else{
            return back()->with('error','添加失败,请稍后重试');
        }
        
        

    }

    /**
     * 显示确认订单页面
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {

        return view('home.cart.confirm');
    }

    /**
     * 删除购物车中商品
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $id = $request->input('id');

        //查询购物车中数据
        $datas_c = Carts::where('uid',1)->get();

        if(empty($datas_c)){
            return back();
        }else{
                //写入购物车库语句
                $res = DB::table('carts')->where('id',$id)->delete();

                if($res){
                    return back();
                }
            
        }
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
     * 购物车数量加
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //查询购物车中数据
        $datas_c = Carts::where('id',29)->get();

        if(empty($datas_c)){
            return back();
        }else{
            foreach($datas_c as $k=>$v){
                $n = $v->num+1;

                $data_in['num'] = $n;

                //写入购物车库语句
                $res = DB::table('carts')->where('id',$v->id)->update($data_in);

                if($res){
                    return back();
                }
            }
            
        }
    }

    /**
     * 购物车数量减
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        //查询购物车中数据
        $datas_c = Carts::where('id',29)->get();

        if(empty($datas_c)){
            return back();
        }else{
            foreach($datas_c as $k=>$v){
                $n = $v->num-1;

                if($n == 0){
                    $n = 1;
                    return back();
                }

                $data_in['num'] = $n;

                //写入购物车库语句
                $res = DB::table('carts')->where('id',$v->id)->update($data_in);

                
            }
            

            if($res){
                return back();
            }
            
        }
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
    public function destroy(Request $request,$id)
    {
        //
    }

    public function clear(Request $request)
    {
        $uid = $request->input('uid');

        $res = DB::table('carts')->where('uid',$uid)->delete();

        if($res){
            return back();
        }
        
    }

    public function next()
    {

    }

    public function car1(Request $request)
    {
        //获取传过来的值
        $id = $request->input('id');
        $token = $request->input('_token');
        $num = $request->input('num');
        $cid = $request->input('cid');
        $uid = 1;
        //查询商品表中指定商品
        $data = Goods::where('id',$id)->where('status',1)->get();
        //查询商品表中和指定商品类型一样的商品
        $datas = Goods::where('cid',$cid)->get();
        //将传过来的数据保存在数组中
        $data_in['gid'] = $id;
        $data_in['num'] = $num;
        $data_in['uid'] = $uid;
        //写入购物车库语句
        $res = DB::table('carts')->insert($data_in);

        $cates_data = Cates::get();
        
        if($res){

            $datas_c = Carts::where('uid',1)->get();

            if(empty($datas_c)){
                $all = 0;
            }else{
                $all = 0;
                foreach($data as $k=>$v){
                    foreach($datas_c as $kk=>$vv){
                        $all += $v->price*$vv->num;
                        $uid = $vv->uid;
                    }
                }
                
            }
            
            return view('home.cart.index',['data'=>$data,'datas'=>$datas,'cates_data'=>$cates_data,'datas_c'=>$datas_c,'all'=>$all,'uid'=>$uid]);
        }else{
            return back()->with('error','添加失败,请稍后重试');
        }
        
        // if($token){
        //     echo "666";
        //     $token = 0;
        //     dd($token);
        // }else{
        //     echo "777";
        // }
        // $data = Goods::where('id',$id)->first();

        // $insert['gid'] = $id;
        // $insert['uid'] = $uid;
        // $insert['num'] = $num;
        
        // $res = DB::table('carts')->insert($insert);
        // if($res){
        //     echo "666";
        // }else{
        //     echo "777";
        // }

    }
}
