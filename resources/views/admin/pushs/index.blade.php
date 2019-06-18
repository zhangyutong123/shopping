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
	推荐商品名称： <input type="text" name="search_gpname" value="{{ $params['search_gpname'] or '' }}">
	        <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 推荐商品列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>推荐商品名称</th>
                    <th>推荐商品图片</th>
                    <th>推荐商品价格</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    	<img style=" border:1px solid #ccc;width: 200px;" src="">
                    </td>
                    <td></td>
                    <td>
						<a href="" class="btn btn-warning">修改</a>
						<form action="" method="post" style="display: inline-block;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="删除" class="btn btn-danger">
						</form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="page_page" style="margin-left: 900px;">
    </div>
</div>
@endsection