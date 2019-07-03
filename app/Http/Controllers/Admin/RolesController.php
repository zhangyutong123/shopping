<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RolesController extends Controller
{
    // 所有控制器的名字
    public static function conall()
    {
        return [
            'indexcontroller'=>'后台首页',
            // 'adminuserontroller'=>'管理员管理',
            'userscontroller'=>'用户管理',
            // 'catescontroller'=>'分类管理',
            // 'advscontroller'=>'广告管理',
            // 'announcecontroller'=>'公告管理',
            // 'bannerscontroller'=>'轮播图管理',
            // 'goods_cheapcontroller'=>'特价商品管理',
            // 'goodscontroller'=>'商品管理',
            // 'indexcontroller'=>'首页管理',
            // 'linkscontroller'=>'友情链接管理',
            // 'nodescontroller'=>'权限管理',
            // 'orderscontroller'=>'订单管理',
            // 'replyscontroller'=>'评论管理',
            // 'rolescontroller'=>'角色管理',

        ];
    }

    /**
     * 角色管理显示页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // 接收搜索的参数
        $search_rname = $request->input('search_rname','');

        // 查询数据并进行搜索分页操作
        $roles_data = DB::table('roles')->where('rname','like','%'.$search_rname.'%')->paginate(5);

        // 加载模板
        return view('admin.roles.index',['roles_data'=>$roles_data,'params'=>$request->all()]);
    }

    /**
     * 添加角色页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nodes_data = DB::table('nodes')->get();

        $list = [];
        foreach($nodes_data as $k=>$v){
            $temp['id'] = $v->id;
            // $temp['cname'] = $v->cname;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;
        }


        // 加载模板
        return view('admin.roles.create',['list'=>$list,'conall'=>self::conall()]);
    }

    /**
     * 执行添加页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       DB::beginTransaction();

       $this->validate($request, [
            'rname' => 'required',
            'nids' => 'required',
        ],[
            'rname.required'=>'请输入角色名称!',
            'nids.required'=>'请选择权限!',
        ]);

        $rname = $request->input('rname','');

        $nids = $request->input('nids');

        // 添加角色表
        $rid = DB::table('roles')->insertGetId(['rname'=>$rname]);

        // 添加角色关系表
        foreach ($nids as $k => $v) {
           $res =  DB::table('roles_nodes')->insert(['rid'=>$rid,'nid'=>$v]);  
        }


        if($rid && $res){
            DB::commit();
            return redirect('admin/roles')->with('success','添加成功');
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
     * 角色修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = DB::table('roles')->find($id);
        $nodes = DB::table('nodes')->get();

        $roles_nodes = DB::table('roles_nodes')->get();
        $roles_dd = DB::table('roles_nodes')->where('rid',$id)->get();

        $temp = [];
        foreach($roles_dd as $k=>$v){
            $temp[] = $roles_dd[$k]->nid;
        }
        $list = [];
        foreach ($nodes as $k => $v) {
            $tamp['id'] = $v->id;
            $tamp['aname'] = $v->aname;
            $tamp['desc'] = $v->desc;
            $list[$v->cname][] = $tamp;
        }

        return view('admin.roles.edit',['roles'=>$roles,'list'=>$list,'conall'=>self::conall(),'temp'=>$temp]);
    }

    /**
     * 角色执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rname = $request->input('rname','');
        $nids = $request->input('nids','');

        // 删除旧数据
        $data = DB::table('roles_nodes')->where('rid',$id)->delete();

        foreach($nids as $k=>$v){
            // 添加新数据
            $res = DB::table('roles_nodes')->insert(['rid'=>$id,'nid'=>$v]);
        }

        // 判断逻辑
        if($res){
            return redirect('admin/roles')->with('success','修改成功');
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
    public function destroy($id)
    {
        // 根据id查询数据并进行删除
        $result = DB::table('roles')->where('id',$id)->delete();

        // 判断删除是否成功
        if($result){
            return redirect('/admin/roles')->with('success','删除成功');

        }else{
            return back()->with('error','删除失败');
        }   
    }
}
