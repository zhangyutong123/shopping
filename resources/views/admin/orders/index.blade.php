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
<form action="/admin/orders" method="get">
	评论人： <input type="text" name="search_oname" value="{{ $params['search_oname'] or '' }}">
	        <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 订单管理</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品id</th>
                    <th>收货人姓名</th>
                    <th>收货人电话</th>
                    <th>发货状态</th>
                    <th>数量</th>
                    <th>订单号</th>
                    <th>收货地址</th>
                    <th>留言</th>
                    <th>操作</th>
                </tr>
            </thead>
             <tbody>
                @foreach($orders as $k=>$v)
                <tr>
                	<td>{{ $v->id }}</td>
                	<td>{{ $v->gid }}</td>
                	<td>{{ $v->oname }}</td>
                	<td>{{ $v->tel }}</td>

                 	<td>
                    	@if($v->status ==0)
                            <kbd style="background:#52A052">未发货</kbd>
                        @else
                            <kbd  style="background:#D2A2CC">已发货</kbd>
                        @endif
                    </td>

                    <td>{{ $v->num }}</td>
                    <td>{{ $v->onumber }}</td>
                    <td>{{ $v->aid }}</td>
                    <td>{{ $v->owrite }}</td>
	                <td>
	                	<a href="/admin/orders/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
         
        </table>
    </div>
    <div id="page_page" style="margin-left:400px;">
      
    </div>
</div>
@endsection