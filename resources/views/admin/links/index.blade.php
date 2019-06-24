@extends('admin.public.index')

@section('content')

<!-- 搜索 start -->
<br />
<form action="/admin/links" method="get">
    用户名： <input type="text" name="search_lname" value="{{ $params['search_lname'] or '' }}">
            <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<!-- 搜索 end -->

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类管理</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>友情链接名称</th>
                    <th>友情链接路径</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->lname }}</td>
                    <td>{{ $v->url }}</td>
                    <!-- <td>{{ $v->status }}</td> -->
                    <td>
                        @if($v->status == 0)
                        <kbd style="color: red; font-weight: bold;">未激活</kbd>
                        @else
                        <kbd style="color: green; font-weight: bold;">已激活</kbd>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="/admin/links/{{ $v->id }}/edit?id={{ $v->id }}">修改</a>
                        <form action="/admin/links/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
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
            {{ $links->appends($params)->links() }}
    </div>
    <!-- 分页 end -->      
</div>
@endsection