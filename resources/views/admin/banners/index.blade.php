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
<form action="/admin/banners" method="get">
	轮播图标题： <input type="text" name="search_bname" value="{{ $params['search_bname'] or '' }}">
	        <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 轮播图列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>轮播图标题</th>
                    <th>轮播图片</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($banners as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->bname }}</td>
                    <td>
                    	<img style=" border:1px solid #ccc;width: 200px;" src="/uploads/{{ $v->url}}">
                    </td>
                    <td>
                        @if($v->status == 0)
                        <span href="" style="color: black">已开启</span>
                        @elseif($v->status == 1)
                        <span style="color: gray">未开启</span>
                        @endif
                    </td>
                    <td>
						<a href="/admin/banners/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
						<form action="/admin/banners/{{ $v->id }}" method="post" style="display: inline-block;">
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
    <div id="page_page" style="margin-left: 900px;">
            {{ $banners->appends($params)->links() }}
    </div>
</div>
@endsection