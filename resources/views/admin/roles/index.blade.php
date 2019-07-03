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
<form action="/admin/roles" method="get">
    角色名称： <input type="text" name="search_rname" value="{{ $params['search_rname'] or '' }}">
            <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色管理</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th style="width: 100px;">ID</th>
                    <th>角色名称</th>
                    <th style="width: 200px;">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles_data as $k=>$v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->rname }}</td>
                        <td>
                            <a href="/admin/roles/{{ $v->id }}/edit?id={{ $v->id }}" class="btn btn-info">修改角色权限</a>
                            &nbsp;&nbsp;&nbsp;
                            <form action="/admin/roles/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
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
</div>

@endsection