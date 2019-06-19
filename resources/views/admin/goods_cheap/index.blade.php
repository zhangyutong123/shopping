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
                            <a class="btn btn-info btn-small" href="/goods_cheap/{{ $v->id }}/edit?id={{ $v->id }}">修改</a>
                            <form action="/goods_cheap/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
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