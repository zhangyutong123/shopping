@extends('admin.public.index')

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">分类管理</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <table class="mws-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>分类名称</th>
                            <th>父级ID</th>
                            <th>分类路径</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cates as $k=>$v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->cname }}</td>
                            <td>{{ $v->pid }}</td>
                            <td>{{ $v->path }}</td>
                            <td>
                                <a class="btn btn-info" href="/admin/cates/{{ $v->id }}/edit?id={{ $v->id }}">修改</a>

                                <form action="/admin/cates/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('确定要删除么?')">
                                </form>

                                @if(substr_count($v->path,',') < 2)

                                <a class="btn btn-primary" href="/admin/cates/create?id={{ $v->id }}">添加子分类</a>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                   </tbody>
        </table>
    </div>    
</div>
@endsection