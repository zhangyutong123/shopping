@extends('admin.public.index')


@section('content')
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>管理员页面</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/adminuser" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" name="uname" class="small">
    				</div>
    			</div>
    		     <div class="mws-form-row">
                    <label class="mws-form-label">密码</label>
                    <div class="mws-form-item">
                        <input type="password" name="upass" class="small">
                    </div>
                </div> 

                 <div class="mws-form-row">
                    <label class="mws-form-label">确认密码</label>
                    <div class="mws-form-item">
                        <input type="password" name="repass" class="small">
                    </div>
                </div> 
    			<div class="mws-form-row" style="width: 600px;">
                    <label class="mws-form-label">头像</label>
                    <div class="mws-form-item">
                        <input type="file" name="profile" class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">角色</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            @foreach($roles_data as $k=>$v)
                            <li><input type="radio" {{ $v->rname == '普通员工' ? 'checked' : '' }} name="rid" value="{{ $v->id }}"> <label>{{ $v->rname }}</label></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="Submit" class="btn btn-danger">
    			<input type="reset" value="Reset" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
@endsection