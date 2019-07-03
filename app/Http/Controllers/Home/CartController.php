<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cates;
use App\Models\Carts;
use App\Models\Address;
use App\Models\UsersInfo;
use DB;

class CartController extends Controller
{
    //
    // public function index(Request $request)
    // {}
    public function index(Request $request)
    {
    	//获取传过来的值
        $id = $request->input('id');
        $num = $request->input('num');
        $cid = $request->input('cid');
        $uid = 1;

        //查询商品表中指定商品
        $data = Goods::where('id',$id)->where('status',1)->get();

        foreach($data as $k=>$v){
        	$gname = $v['gname'];
        	$price = $v['price'];
        	$pic = $v['pic'];
        }
        

        //将传过来的数据保存在数组中
        $data_in['gid'] = $id;
        $data_in['num'] = $num;
        $data_in['uid'] = $uid;
        $data_in['gname'] = $gname;
        $data_in['price'] = $price;
        $data_in['pic'] = $pic;

        //写入购物车库语句
        $res = DB::table('carts')->insert($data_in);

        if($res){
           	
           	return redirect('home/cart?id='.$id.'&cid='.$cid.'&uid='.$uid);
        }
        
        
    }

    public function cart(Request $request)
    {
    	//获取传过来的值
        $id = $request->input('id');
        $num = $request->input('num');
        $cid = $request->input('cid');
        $uid = $request->input('uid');
        

        //查询商品表中和指定商品类型一样的商品
        $datas = Goods::where('cid',$cid)->get();

        //分类数据查询
        $cates_data = Cates::get();

    	$datas_c = Carts::where('uid',$uid)->get();

            if(empty($datas_c)){
                $all = 0;
                return view('home.cart.empty',['cates_data'=>$cates_data]);
            }else{
                $all = 0;
                foreach($datas_c as $k=>$v){
                    $all += $v->price*$v->num;
                    $uid = $v->uid;
                }
                
            }

            return view('home.cart.index',['datas'=>$datas,'cates_data'=>$cates_data,'datas_c'=>$datas_c,'all'=>$all,'uid'=>$uid,'id'=>$id]);
    }

    public function clear(Request $request)
    {
        $uid = $request->input('uid');
        $cates_data = Cates::get();

        $res = DB::table('carts')->where('uid',$uid)->delete();

        if($res){
            return view('home.cart.empty',['cates_data'=>$cates_data]);
        }
        
    }

    public function down(Request $request)
    {
    	//接收id值
    	$id = $request->input('id');
    	
        //查询购物车中数据
        $datas_c = Carts::where('uid',1)->get();

        //商品类查询
        $cates_data = Cates::get();

        if(empty($datas_c)){
            return view('home.cart.empty',['cates_data'=>$cates_data]);
        }else{
            foreach($datas_c as $k=>$v){
            	if($v->num !== 1){
            		$n = $v->num-1;
            	}else{
            		$n = 1;
            	}
                
                $data_in['num'] = $n;

            }

        	//写入购物车库语句
            $res = DB::table('carts')->where('id',$v->id)->update($data_in);
            
            if($res){
                return redirect('home/cart?id='.$id.'&num='.$num.'&cid='.$cid.'&uid='.$uid);
            }else{
            	echo "商品购买数量至少为1件!";
            }
            
        }
    }

    public function up(Request $request)
    {
    	//接收id值
    	$id = $request->input('id');
    	
        //查询购物车中数据
        $datas_c = Carts::where('uid',1)->get();

        //商品类查询
        $cates_data = Cates::get();

        if(empty($datas_c)){
            return view('home.cart.empty',['cates_data'=>$cates_data]);
        }else{
            foreach($datas_c as $k=>$v){
                $n = $v->num+1;

                $data_in['num'] = $n;

            }

        	//写入 购物车库 语句
            $res = DB::table('carts')->where('id',$v->id)->update($data_in);
            
            if($res){
                return redirect('home/cart?id='.$id.'&num='.$num.'&cid='.$cid.'&uid='.$uid);
            }
            
        }
    }

    public function confirm(Request $request)
    {
    	//接收传过来的值
    	$id = $request->input('id');
    	$uid = $request->input('uid');
    	
    	//查询购物车中数据
        $datas_c = Carts::where('uid',$uid)->get();

        //查询用户详情表中数据
        $user_info = UsersInfo::where('uid',$uid)->get();

        //查询用户地址表中数据
        $address = Address::where('uid',$uid)->get();

        if(empty($datas_c)){
                $all = 0;
            }else{
                $all = 0;
                foreach($datas_c as $k=>$v){
                    $all += $v->price*$v->num;
                    $uid = $v->uid;
                }
                
            }

    	return view('home.cart.confirm',['datas_c'=>$datas_c,'user_info'=>$user_info,'address'=>$address,'all'=>$all]);
    }

    public function delete(Request $request)
    {
    	$id = $request->input('id');
    	$uid = $request->input('uid');

    	//获取购物车表中数据
    	$datas_c = Carts::where('uid',$uid)->get();

    	//分类数据查询
        $cates_data = Cates::get();

    	$res = DB::table('carts')->where('id',$id)->delete();

    	if($res){
    		if(empty($datas_c)){
    			return view('home.cart.empty',['cates_data'=>$cates_data]);
    		}else{

    		}
    		return back();
    	}



    	

    	
    }

    public function next(Request $request)
    {
    	$aid = $request->input('aid');
    	$uid = $request->input('uid');
    	$all = $request->input('all');
    	
    	//查询购物车中数据
        $datas_c = Carts::where('uid',$uid)->get();

        //查询地址表中数据
        $datas_a = Address::where('id',$aid)->get();

        foreach($datas_c as $k=>$v){
        	
        	foreach( $datas_a as $kk=>$vv){
        		$data[$v->id]['num'] = $v->num;
        		$data[$v->id]['gid'] = $v->gid;
        		$data[$v->id]['num'] = $v->num;
        		$data[$v->id]['aid'] = $aid;
        		$data[$v->id]['uid'] = $uid;
        		$data[$v->id]['oname'] = $vv->aname;
        		$data[$v->id]['tel'] = $vv->aphone;
        		$data[$v->id]['province'] = $vv->province;
        		$data[$v->id]['onumber'] = date('YmdHis',time()).rand('1000','9999');
        	}
        }
        $res = DB::table('orders')->insert($data);
        if($res){
        	$res1 = DB::table('carts')->where('uid',$uid)->delete();
        	if($res1){
        		return redirect('home/cart/last?aid='.$aid.'&uid='.$uid.'&all='.$all);
        	}
        	
        }
    	
    }

    public function last(Request $request)
    {
    	$aid = $request->input('aid');
    	$uid = $request->input('uid');
    	$all = $request->input('all');

    	//查询地址表中数据
        $datas_a = Address::where('id',$aid)->get();

    	return view('home.cart.success',['all'=>$all,'uid'=>$uid,'datas_a'=>$datas_a]);
    }
}
