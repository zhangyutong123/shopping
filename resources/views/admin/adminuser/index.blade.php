@extends('admin.public.index')

@section('content')
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
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
                <tr>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->id }}</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $v->uname }}</font></font></td>
                    <td>
						<a href="">删除</a>
						<a href="">修改角色</a>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection