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
<form action="/admin/advs" method="get">
	广告： <input type="text" name="search_title" value="{{ $params['search_title'] or '' }}">
	        <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 广告列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>广告标题</th>
                    <th>广告图片</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($advs as $k=>$v)
                <tr>
                	<td>{{ $v->id }}</td>
                    <td>{{ $v->title }}</td>
                    <td>
                    	<img style=" border:1px solid #ccc;width: 88px;" src="/uploads/{{ $v->url}}">
                    </td>
	                <td>
						<a href="/admin/advs/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                         
						<form action="/admin/advs/{{ $v->id }}" method="post" style="display: inline-block;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="删除" class="btn btn-danger" onclick= "return confirm('确认要删除吗?')">
						</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="page_page" style="margin-left:400px;">
         
            {{ $advs->appends($params)->links() }}

    </div>
</div>
@endsection