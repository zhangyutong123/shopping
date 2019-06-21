<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\orders;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //显示订单
         $search_oname = $request->input('search_oname','');
        $orders= Orders::where('oname','like','%'.$search_oname.'%')->paginate(5);
        // 加载页面

        return view('admin.orders.index',['orders'=>$orders,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示订单
        echo"222";
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
         $orders = Orders::find($id);

        // 加载修改页面
        return view('admin.orders.edit',['orders'=>$orders]);
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
        // 订单 执行修改
         DB::beginTransaction();

        // 接收数据
        $orders = Orders::first();
        $orders->oname = $request->input('oname');
        $orders->tel = $request->input('tel');
        $orders->aid = $request->input('aid');
        $orders->status = $request->input('status');

        $orders->num = $request->input('num');
        $orders->gid = $request->input('gid');
        $orders->onumber = $request->input('onumber');


        // 保存数据
        $res = $orders->save();

        // 判断是否执行成功
        if ($res) {
            DB::commit();
            return redirect('admin/orders')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
    }
  }
 
}
