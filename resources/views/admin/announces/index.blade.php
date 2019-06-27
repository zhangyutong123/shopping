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
<form action="/admin/announce" method="get">
	公告标题： <input type="text" name="search_aname" value="{{ $params['search_aname'] or '' }}">
	        <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 公告列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>公告标题</th>
                    <th>公告标签</th>
                    <th>公告内容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($announces as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->aname }}</td>
                    <td>{{ $v->alabel }}</td>
                    <td>{{ $v->acontent }}</td>
                    <td>
						<a href="/admin/announce/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
						<form action="/admin/announce/{{ $v->id }}" method="post" style="display: inline-block;">
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
			{{ $announces->appends($params)->links() }}
    </div>
</div>
@endsection