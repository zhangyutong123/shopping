@extends('admin.public.index')

@section('content')

<!-- 搜索 start -->
<br />
<form action="/admin/goods_cheap" method="get">
    用户名： <input type="text" name="search_chname" value="{{ $params['search_chname'] or '' }}">
            <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<!-- 搜索 end -->

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类管理</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <table class="mws-table" style="text-align: center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>特价商品名称</th>
                        <th>特价商品价格</th>
                        <th>商品图片</th>
                        <th>特价商品原价</th>
                        <th>特价商品尺寸</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($goods_cheap as $k=>$v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->gcname }}</td>
                        <td>{{ $v->gcprice }}</td>
                        <td><img src="/uploads/{{ $v->gcprofile }}" style="width: 50px;"></td>
                        <td>{{ $v->gprice }}</td>
                        <td>{{ $v->gcsize }}</td>
                        <td>
                            <a class="btn btn-info" href="/admin/goods_cheap/{{ $v->id }}/edit?id={{ $v->id }}">修改</a>
                            <form action="/admin/goods_cheap/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('确认要删除么?')">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>  
    <!-- 分页 start -->
    <div id="page_page" style="margin-left: 900px;">
            {{ $goods_cheap->appends($params)->links() }}
    </div>
    <!-- 分页 end -->    
</div>
@endsection