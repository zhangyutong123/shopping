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
        	<span>用户添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">用户名</label>
        				<div class="mws-form-item">
        					<input type="text" name="uname" class="small" value="{{ old('uname') }}">
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
					

					<div class="mws-form-row">
        				<label class="mws-form-label">邮箱</label>
        				<div class="mws-form-item">
        					<input type="text" name="email" class="small" value="{{ old('email') }}">
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">手机号</label>
        				<div class="mws-form-item">
        					<input type="text" name="tel" class="small" value="{{ old('tel') }}">
        				</div>
        			</div>
				

					<div class="mws-form-row" style="width: 450px;">
        				<label class="mws-form-label">头像</label>
        				<div class="mws-form-item" style="width: 450px;">
        					<input type="file" name="profile" class="small" style="width: 440px;">
        				</div>
        			</div>
	

        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="确认添加" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection