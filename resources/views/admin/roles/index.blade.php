@extends('admin.public.index')

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
                            <a href="" class="btn btn-info">修改角色权限</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection