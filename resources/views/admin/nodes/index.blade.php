@extends('admin.public.index')

@section('css')
<style type="text/css">
#page_page{
    margin-top: 15px;
}
#page_page ul,#page_page li{
    margin: 0;
    padding: 0;
    list-style-type: none;
}

#page_page a,#page_page span{
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
}

#page_page .active span{
    color:#fff;
    background-color: #40C088;
}


</style>
@endsection

@section('content')

    <!-- 搜索 -->
<br />
<form action="/admin/nodes" method="get">
    权限名称： <input type="text" name="search_dname" value="{{ $params['search_dname'] or '' }}">
            <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限列表</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>权限名称</th>
                    <th>控制器名称</th>
                    <th>方法名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->desc }}</td>
                    <td>{{ $v->cname }}</td>
                    <td>{{ $v->aname }}</td>
                	<td>
                        <a class="btn btn-info" href="/admin/nodes/{{ $v->id }}/edit?id={{ $v->id }}">修改</a>
                        <form action="/admin/nodes/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
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
            {{ $data->appends($params)->links() }}
    </div>
    <!-- 分页 end -->
</div>

@endsection