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

<br />
<form action="/admin/adminuser" method="get">
    管理员名： <input type="text" name="search_auname" value="{{ $params['search_auname'] or '' }}">
            <input type="submit" class="btn btn-info" value="搜索">
</form>
<br />
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员列表</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table" style="text-align: center;">
            <thead>
                <tr>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名称</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr> 
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->id }}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->uname }}</font></font></td>
                    <td>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">123</font></font>
                    </td>
                    <td>
						<form action="/admin/adminuser/{{ $v->id }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('确定要删除么?')">
                        </form>
						<a href="/admin/roles/{{ $v->id }}/edit" class="btn btn-primary">修改角色</a>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    <div id="page_page" style="margin-left: 900px;">
            {{ $data->appends($params)->links() }}
    </div>
</div>

@endsection