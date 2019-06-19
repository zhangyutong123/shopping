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
                        <kbd style="background: red;">未激活</kbd>
                        @else
                        <kbd style="background: green;">已激活</kbd>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info btn-small" href="/links/{{ $v->id }}/edit?id={{ $v->id }}">修改</a>
                        <form action="/links/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>      
</div>
@endsection