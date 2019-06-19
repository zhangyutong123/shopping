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
                            <th>商品名称</th>
                            <th>商品价格</th>
                            <th>商品图片</th>
                            <th>商品状态</th>
                            <th>商品品牌</th>
                            <th>商品类</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($goods as $k=>$v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->gname }}</td>
                            <td>{{ $v->price }}</td>
                            <td><img src="/uploads/{{ $v->pic }}" style="width: 50px;"></td>
                            <td>{{ $v->status }}</td>
                            <td>{{ $v->brand }}</td>
                            <!-- <td>{{ $v->cid }}</td> -->
                            <td>
                                @foreach($cates as $kk=>$vv)
                                @if($v->cid == $vv->id)
                                <span>{{ $vv->cname }}</span>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-info btn-small" href="/goods/{{ $v->id }}/edit?id={{ $v->id }}&cid={{ $v->cid }}">修改</a>
                                <form action="/goods/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
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