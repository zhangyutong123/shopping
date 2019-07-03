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
<form action="/admin/replys" method="get">
	评论人： <input type="text" name="search_uid" value="{{ $params['search_uid'] or '' }}">
	        <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 评论管理</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户id</th>
                    <th>评论内容</th>
                    <th>评论时间</th>
                    <th>商品id</th>
                    <th>操作</th>
                </tr>
            </thead>
             <tbody>
                @foreach($replys as $k=>$v)
                <tr>
                	<td>{{ $v->id }}</td>
                    <td>{{ $v->uid }}</td>
                    <td>{{ $v->content }}</td>
                     <td>{{ $v->ctime }}</td>
                     <td>{{ $v->gid }}</td>
	                <td>
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
             {{ $replys->appends($params)->links() }}
    </div>
</div>
@endsection