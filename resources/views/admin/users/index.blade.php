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
<form action="/admin/users" method="get">
	用户名： <input type="text" name="search_uname" value="{{ $params['search_uname'] or '' }}">

    邮箱： <input type="text" name="search_email" value="{{ $params['search_email'] or ''}}">
	        <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 用户列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>权限</th>
                    <th>邮箱</th>
                    <th>手机号</th>
                    <th>头像</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($users as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->uname }}</td>
                    <td>
                        @if ($v->type == 0)
                            <span style="color: red;">超级管理员</span>
                        @elseif ($v->type == 1)
                            <span style="color: orange;">管理员</span>
                        @elseif ($v->type == 2)
                            <span style="color: black; font-weight: bold;">普通会员</span>
                        @endif
                    </td>
                    <td>{{ $v->userinfo->email }}</td>
                    <td>{{ $v->userinfo->tel }}</td>
                    <td>
                    	<img style="border-radius: 5px;border:1px solid #ccc;width: 50px;" src="/uploads/{{ $v->userinfo->profile}}">
                    </td>
                    <td>{{ $v->created_at}}</td>
                    <td>
						<a href="/admin/users/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
						<form action="/admin/users/{{ $v->id }}" method="post" style="display: inline-block;">
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
    <div id="page_page" style="margin-left: 900px;">
            {{ $users->appends($params)->links() }}
    </div>
</div>
@endsection